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
use App\Models\RazorpayPayment;
use App\Mail\EventConfirmationMail;

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
        return view('home.razorpay_payment', compact('event', 'eventform'));
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

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $payment = $api->payment->fetch($input['razorpay_payment_id']);

            if (!empty($input['razorpay_payment_id'])) {
                $response = $api->payment->fetch($input['razorpay_payment_id'])
                                         ->capture(['amount' => $payment['amount']]);

                // Save Razorpay payment details
                $razorpayPayment = new RazorpayPayment();
                $razorpayPayment->event_id = $input['event_id'];
                $razorpayPayment->eventform_id = $input['eventform_id'];
                $razorpayPayment->event_amount = $payment['amount'] / 100; // Convert paise to INR
                $razorpayPayment->payment_date = now();
                $razorpayPayment->status = 'Paid';
                $razorpayPayment->save();

                // Send confirmation mail
                $event = Event::findOrFail($input['event_id']);
                $eventform = EventForm::findOrFail($input['eventform_id']);

                $mailData = [
                    'name' => $eventform->name,
                    'email' => $eventform->email,
                    'event_title' => $event->title,
                    'event_time' => $event->eventstartdatetime,
                    'event_address' => $event->mode === 'Offline' ? $event->event_address : null,
                    'event_link' => $event->mode === 'Online' ? $event->event_link : null,
                ];

                Mail::to($eventform->email)->send(new EventConfirmationMail($mailData));

                return redirect()->route('eventregister')
                                 ->with('success', 'Payment successful. Confirmation email sent.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



}
