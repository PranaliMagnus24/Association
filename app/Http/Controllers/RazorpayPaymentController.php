<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Exception;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Models\Event;
use App\Models\EventForm;
use App\Models\Country;
use App\Models\GeneralSetting;
use App\Models\City;
use App\Models\State;
use App\Models\Zipcode;
use App\Models\RazorpayPayment;
use App\Mail\EventConfirmationMail;
use App\Mail\EventInvoiceMail;
use SimpleQrcode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Imagick;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Str;
use File;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function razorpayindex(Request $request): View
    {
        $eventId = $request->input('event_id');
        $eventformId = $request->input('eventform_id');
        $event = Event::findOrFail($eventId);
        $eventform = EventForm::findOrFail($eventformId);
        $generalSetting = GeneralSetting::first();
        return view('home.razorpay_payment', compact('event', 'eventform','generalSetting'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request): RedirectResponse
{
    try {
        $input = $request->all();

        if (!isset($input['razorpay_payment_id'])) {
            return redirect()->back()->with('error', 'Invalid payment request.');
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $payment->capture(['amount' => $payment['amount']]);

        //Stored form data from session
        $eventFormData = session('event_form_data');

        if (!$eventFormData || empty($eventFormData['event_id']) || empty($eventFormData['name']) || empty($eventFormData['email'])) {
            return redirect()->back()->with('error', 'Session expired or incomplete data. Please try again.');
        }

        // Store event form data
        $eventform = EventForm::create($eventFormData);

        // Store Razorpay payment details
        $razorpayPayment = new RazorpayPayment();
        $razorpayPayment->event_id = $eventform->event_id;
        $razorpayPayment->eventform_id = $eventform->id;
        $razorpayPayment->event_amount = $payment['amount'] / 100;
        $razorpayPayment->payment_date = now();
        $razorpayPayment->status = 'Paid';
        $razorpayPayment->save();

        // Clear session data
        session()->forget('event_form_data');

        // Fetch event details
        $event = Event::findOrFail($eventform->event_id);

        $generalSetting = GeneralSetting::first();
        // Initialize QR Code Path (Only for Offline Events)
        $qrCodePath = null;

        // Ensure QR Code directory exists
        if ($event->mode === 'Offline') {
            // Ensure QR Code directory exists
            if (!File::exists(public_path('upload/qr_code'))) {
                File::makeDirectory(public_path('upload/qr_code'), 0755, true);
            }

            // Generate QR Code
            $qrData = route('qrpage', ['eventform_id' => $eventform->id]);
            $qrCodePath = 'upload/qr_code/event_' . $eventform->id . '.png';
            QrCode::format('png')->size(200)->generate($qrData, public_path($qrCodePath));
        }

        // Prepare Email Data
        $data = [
            'name' => $eventform->name,
            'phone' => $eventform->phone,
            'email' => $eventform->email,
            'event_title' => $event->title,
            'event_introduction' => $event->introduction,
            'event_time' => $event->eventstartdatetime,
            'event_address' => $event->mode === 'Offline' ? $event->event_address : null,
            'event_link' => $event->mode === 'Online' ? $event->event_link : null,
            'qr_code' => $event->mode === 'Offline' ? public_path($qrCodePath) : null,
        ];

        // Generate Confirmation PDF
        $pdfPath = storage_path('app/public/event_confirmation_' . $eventform->id . '.pdf');
        $pdf = PDF::loadView('home.contact.event_pdf', ['mailData' => $data]);
        $pdf->save($pdfPath);

        // Generate Invoice PDF
        $invoiceData = [
            'name' => $eventform->name,
            'phone' => $eventform->phone,
            'email' => $eventform->email,
            'event_title' => $event->title,
            'event_introduction' => $event->introduction,
            'event_amount' => $razorpayPayment->event_amount,
            'event_address' => $event->mode === 'Offline' ? $event->event_address : null,
            'event_link' => $event->mode === 'Online' ? $event->event_address : null,
            'event_date' => Carbon::parse($event->eventstartdatetime)
                            ->setTimezone('Asia/Kolkata')
                            ->format('d F Y, h:i A'),
            'event_payment_date' => Carbon::parse($razorpayPayment->payment_date)
                            ->setTimezone('Asia/Kolkata')
                            ->format('d F Y, h:i A'),
            'association_name' => $generalSetting->association_name ?? 'N/A',
            'association_address' => $generalSetting->address ?? 'N/A',
            'gst_number' => $generalSetting->gst_number ?? 'N/A',
            'association_logo' => $generalSetting->association_logo
            ? public_path('upload/general_setting/' . $generalSetting->association_logo)
            : null,
        ];

        $invoicePdfPath = storage_path('app/public/event_invoice_' . $eventform->id . '.pdf');
        $invoicePdf = PDF::loadView('home.contact.event_invoice_pdf', ['invoiceData' => $invoiceData]);
        $invoicePdf->save($invoicePdfPath);

        // Send emails
        if ($event->type === 'Paid') {
            Mail::to($eventform->email)->send(new EventConfirmationMail($data, $pdfPath));
            Mail::to($eventform->email)->send(new EventInvoiceMail($invoiceData, $invoicePdfPath));
        } else {
            Mail::to($eventform->email)->send(new EventConfirmationMail($data, $pdfPath));
        }

        return redirect()->route('home.index')->with('success', 'Payment successful. Confirmation and Invoice emails sent.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}






}
