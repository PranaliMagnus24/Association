<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Imagick;
use App\Models\CompanyPro;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Zipcode;
use App\Models\Event;
use App\Models\EventForm;
use Razorpay\Api\Api;
use App\Mail\EventConfirmationMail;
use SimpleQrcode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Str;
use File;

class EventDetailsController extends Controller
{

    //Display event detail card page
    public function eventdetails($id)
    {
        $event = Event::with('cities', 'states', 'countries')->find($id);
        return view('home.event_details', compact('event'));
    }


    //event register page
    public function eventregister($id)
    {
        $countries = Country::select("id", "name")->get();
        $event = Event::findOrFail($id);
        $eventform =EventForm::inRandomOrder()->get();
        return view('home.event_register', compact('event', 'countries', 'eventform'));
    }


    //event register store
    public function eventstore(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|digits:10',
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        'country' => 'nullable|string|max:255',
        'state' => 'nullable|string',
        'city' => 'nullable|string',
        'usergst_number' => 'nullable|string',
        'event_id' => 'required|exists:events,id',
    ]);

    try {
        if ($request->input('form_type') !== 'event_form') {
            return response()->json([
                'success' => false,
                'message' => 'Invalid form type.',
            ]);
        }

        $event = Event::findOrFail($request->input('event_id'));

        // If Free, save data directly
        $eventform = EventForm::create($validated + ['event_id' => $event->id]);

        // If event is Paid, redirect to Razorpay payment
        if ($event->type === 'Paid') {
            session(['event_form_data' => $validated]);

            return response()->json([
                'success' => true,
                'redirect_url' => route('razorpay.payment.index', [
                    'event_id' => $eventform->event_id,
                    'eventform_id' => $eventform->id
                ]),
            ]);
        }

        // Prepare Mail Data
        $data = [
            'name' => $eventform->name,
            'phone' => $eventform->phone,
            'city' => optional($eventform->cities)->name,
            'email' => $eventform->email,
            'event_title' => $event->title,
            'event_introduction' => $event->introduction,
            'event_time' => $event->eventstartdatetime,
            'valid_period' => $event->eventstartdatetime && $event->eventenddatetime
            ? Carbon::parse($event->eventstartdatetime)->format('d F') . ' - ' .
              Carbon::parse($event->eventenddatetime)->format('d F Y')
            : null,
            'event_address' => $event->mode === 'Offline' ? $event->event_address : null,
            'event_link' => $event->mode === 'Online' ? $event->event_link : null,
            'qr_code' => null,
        ];

        // Generate QR Code only for Offline events
        if ($event->mode === 'Offline') {
            $qrData = route('qrpage', ['eventform_id' => $eventform->id]);
            $qrCodePath = 'upload/qr_code/event_' . $eventform->id . '.png';
            $qrCodeFullPath = storage_path('app/public/' . $qrCodePath);

            if (!file_exists(dirname($qrCodeFullPath))) {
                mkdir(dirname($qrCodeFullPath), 0777, true);
            }

            QrCode::format('png')->size(200)->generate($qrData, $qrCodeFullPath);
            $data['qr_code'] = $qrCodeFullPath;
        }

        // Generate PDF
        $pdf = PDF::loadView('home.contact.event_pdf', ['mailData' => $data]);
        $pdf->setPaper([0, 0, 375, 667], 'portrait');
        $pdfPath = storage_path('app/public/event_confirmation_' . $eventform->id . '.pdf');
        $pdf->save($pdfPath);

        // Send Email
        Mail::to($eventform->email)->send(new EventConfirmationMail($data, $pdfPath));

        return response()->json([
            'success' => true,
            'message' => 'Your registration is successful! Confirmation email sent.',
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'An unexpected error occurred: ' . $e->getMessage(),
        ]);
    }
}







    /**

     * Write code on Method

     *

     * @return response()

     */

     public function fetchState(Request $request)

     {

         $data['states'] = State::where("country_id", $request->country_id)

                                 ->get(["name", "id"]);



         return response()->json($data);

     }

     /**

      * Write code on Method

      *

      * @return response()

      */

     public function fetchCity(Request $request)

     {

         $data['cities'] = City::where("state_id", $request->state_id)

                                     ->get(["name", "id"]);



         return response()->json($data);

     }
}
