@include('home.contact.layouts.header')

<tr>
    <td class="content">
        <h3>Event Booking Confirmation</h3>
        <p>Dear {{ $mailData['name'] }},</p>
        <p>Thank you for registering for <strong>{{ $mailData['event_title'] }}</strong>.</p>
        <ul>
            <li><strong>Email:</strong> {{ $mailData['email'] }}</li>
            <li><strong>Phone:</strong> {{ $mailData['phone'] }}</li>
        </ul>

        <p>Event Details:</p>
        <ul>
            <li><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($mailData['event_time'])->format('d F Y h:i A') }}</li>
            @if($mailData['event_address'])
                <li><strong>Address:</strong> {{ $mailData['event_address'] }}</li>
            @endif
            @if($mailData['event_link'])
                <li><strong>Join Link:</strong> <a href="{{ $mailData['event_link'] }}">{{ $mailData['event_link'] }}</a></li>
            @endif
        </ul>

        @if($mailData['qr_code'])
            <p>Scan the QR code below for quick access to your event details:</p>
            <div style="text-align: center;">
        <img src="{{ $message->embed($mailData['qr_code']) }}" alt="Event QR Code" style="width: 200px; height: 200px; display: block; margin: 0 auto;">
    </div>
        @endif

        <p>We look forward to seeing you!</p>
    </td>
</tr>


@include('home.contact.layouts.footer')
