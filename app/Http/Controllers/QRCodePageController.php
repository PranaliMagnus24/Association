<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventForm;

class QRCodePageController extends Controller
{
    public function showEventFormDetails($eventform_id)
    {
        // $eventform_id = $request->eventform_id;
        // \Log::info("Accessing QR code page for eventform_id: " . $eventform_id);

        try {
            $eventForm = EventForm::with('event', 'cities', 'states', 'countries')->findOrFail($eventform_id);

            return view('admin.events.qr_code_page', compact('eventForm', 'eventform_id'));
        } catch (\Exception $e) {
            return redirect()->route('admin.dashboard')->with('error', 'QR Code Information not found.' . $e->getMessage());
        }
    }


    public function checkIn($id)
{
    $eventForm = EventForm::findOrFail($id);
    if ($eventForm->check_out) {
        $eventForm->check_in = Carbon::now()->timezone('Asia/Kolkata')->toDateTimeString();
        $eventForm->check_out = null;
        $eventForm->save();
    }

    if (!$eventForm->check_in) {
        $eventForm->check_in = Carbon::now()->timezone('Asia/Kolkata')->toDateTimeString();
        $eventForm->save();
    }

    return back()->with('success', 'Checked In Successfully');
}

public function checkOut($id)
{
    $eventForm = EventForm::findOrFail($id);
    if ($eventForm->check_in && !$eventForm->check_out) {
        $eventForm->check_out = Carbon::now()->timezone('Asia/Kolkata')->toDateTimeString();
        $eventForm->save();
    }

    return back()->with('success', 'Checked Out Successfully');
}





}
