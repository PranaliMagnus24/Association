<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use File;
use App\Models\Event;
use App\Models\EventForm;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventController extends Controller
{
    public function eventlist(Request $request)
    {
        $search = $request->get('search');
        $status = $request->get('status');

        $query = Event::query();

        // Apply search and filter
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        // Use paginate() instead of all()
        $events = $query->withCount('eventform')->paginate(5);

        return view('admin.events.list_event', compact('events'));
    }

    public function addevent()
    {
        return view('admin.events.add_event');
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'introduction' => 'required|string',
        'description' => 'required|string',
        'eventstartdatetime' => 'required|date',
        'eventenddatetime' => 'required|date',
        'registerstartdatetime' => 'required|date',
        'registerenddatetime' => 'required|date',
        'type' => 'required|string',
        'event_amount' => 'nullable|numeric',  // Ensure it's numeric
        'mode' => 'required|string',
        'event_link' => 'nullable|string',
        'event_address' => 'nullable|string',
        'status' => 'required|string',
        'upload' => 'required|file|mimes:jpg,jpeg,png,pdf',  // Ensure correct file format
    ]);

       $event = new Event();
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('upload/events/'), $filename);
        $event->upload = $filename;
    }

    // Assign the rest of the event data
    $event->title = $request->title;
    $event->introduction = $request->introduction;
    $event->description = $request->description;
    $event->eventstartdatetime = $request->eventstartdatetime;
    $event->eventenddatetime = $request->eventenddatetime;
    $event->registerstartdatetime = $request->registerstartdatetime;
    $event->registerenddatetime = $request->registerenddatetime;
    $event->type = $request->type;
    $event->event_amount = $request->event_amount;
    $event->mode = $request->mode;
    $event->event_link = $request->event_link;
    $event->event_address = $request->event_address;

    $event->status = $request->status;

    // Save the event to the database
    try {
        if ($event->save()) {
            toastr()->timeOut(5000)->closeButton()->addSuccess('Event created successfully!');
            return redirect()->route('list.event');
        } else {
            return redirect()->back()->with('error', 'Failed to save the event.');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

  public function eventedit($id)
   {
    $event = Event::findOrFail($id);
       return view('admin.events.edit_event', compact('event'));
   }

   public function eventupdate(Request $request, $id)
   {
       $request->validate([
           'title' => 'required|string',
           'introduction' => 'required|string',
           'description' => 'required|string',
           'eventstartdatetime' => 'required|string',
           'eventenddatetime' => 'required|string',
           'registerstartdatetime' => 'required|string',
           'registerenddatetime' => 'required|string',
           'type' => 'required|string',
           'event_amount' => 'nullable',
           'mode' => 'required|string',
           'event_link' => 'nullable',
           'event_address' => 'nullable',
           'status' => 'required|string',
           'upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
       ]);

       $event = Event::findOrFail($id);

       if ($request->hasFile('upload')) {
           if (!empty($event->upload) && file_exists(public_path('upload/events/' . $event->upload))) {
               unlink(public_path('upload/events/' . $event->upload));
           }
           $file = $request->file('upload');
           $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('upload/events/'), $filename);
           $event->upload = $filename;
       }

       $event->event_amount = $request->event_amount ?? null;
       $event->event_link = $request->event_link ?? null;

       $event->update($request->except(['upload', 'event_amount', 'event_link']));

       $event->save();

       toastr()->timeOut(5000)->closeButton()->addSuccess('Event updated successfully!');
       return redirect()->route('list.event');
   }



   public function eventdelete($id)
   {
      $event = Event::findOrFail($id);
      $event->delete();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Event deleted successfully.');
      return redirect()->route('list.event');
   }

   public function eventshow($id)
   {
    $event = Event::find($id);
       return view('admin.events.view_event', compact('event'));
   }


   public function viewRegistrations($eventId)
{
    $event = Event::with(['countries', 'states', 'cities'])->findOrFail($eventId);

    $registrations = $event->eventform()->orderBy('created_at', 'desc')->paginate(20);

    return view('admin.events.view_registrations', compact('event', 'registrations'));
}



public function exportRegistrations($eventId)
{
    $event = Event::findOrFail($eventId);
    $registrations = $event->eventform()->orderBy('created_at', 'desc')->get();

    $fileName = 'registrations_' . now()->format('Y-m-d_H-i-s') . '.csv';

    $response = new StreamedResponse(function () use ($registrations) {
        $handle = fopen('php://output', 'w');

        // CSV Headers
        fputcsv($handle, ['ID', 'Name', 'Phone', 'Email', 'Country', 'State', 'City', 'GST Number', 'Registration Date & Time']);

        // CSV Data
        foreach ($registrations as $registration) {
            fputcsv($handle, [
                $registration->id,
                $registration->name,
                $registration->phone,
                $registration->email,
                $registration->countries->name ?? 'N/A',
                $registration->states->name ?? 'N/A',
                $registration->cities->name ?? 'N/A',
                $registration->usergst_number ?? 'N/A',
                $registration->created_at ? \Carbon\Carbon::parse($registration->created_at)->format('d F Y h:i A') : 'N/A',
            ]);
        }

        fclose($handle);
    });

    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

    return $response;
}





}
