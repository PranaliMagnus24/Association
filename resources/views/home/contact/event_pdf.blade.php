<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <title>Event Confirmation PDF</title>
    <style type="text/css">
        * { -webkit-font-smoothing: antialiased; padding: 0; margin: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        img { max-width: 100%; height: auto; }
        h5 { font-size: 16px; font-weight: bold; margin: 0 0 10px; }
        ol { margin: 0 0 20px 30px; padding: 0; }
        li { margin: 0 0 10px; }
        .wrapper { width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; }
        .content { font-size: 14px; color: #333; line-height: 24px; text-align: left; }
        .qrcode { text-align: center; margin: 20px 0; }
        .footer { font-size: 14px; color: #666; text-align: center; padding: 5px 0; margin: 0; }
        @media only screen and (max-width: 599px) {
            .wrapper { width: 100%; padding: 15px; }
        }
    </style>
</head>
<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="background: #082027;">
                <!-- <img src="https://telad.ridersrally.in/images/madmax-hdr-email.jpg" alt="logo"> -->
            </td>
        </tr>
        <tr>
            <td class="content">
                <p>Dear {{ $mailData['name'] }},</p>
                <p>{!! $mailData['event_introduction'] !!}</p>
                <p>Here's all you need for the entry – let the anticipation rev up!</p>


      <!--- depends on online-->  @if($mailData['qr_code'])
        <p><strong>QR Code:</strong></p>
                <div class="qrcode">
                    <img src="{{ $mailData['qr_code'] }}" alt="Event QR Code">
                </div>
                @endif
                <h5>Details:</h5>
                @if($mailData['qr_code']) {{-- Check if QR code exists --}}
    <ol>
        <li>QR code is mandatory at the entry gate.</li>

        @if($mailData['event_address'] || $mailData['event_link']) {{-- Show only if address or link exists --}}
            <li>
                @if($mailData['event_address'])
                    Event Location: {{ $mailData['event_address'] }}<br/>
                    <a href="https://www.google.com/maps/search/{{ urlencode($mailData['event_address']) }}"
                       target="_blank"
                       style="color: #31b0e5; font-weight: bold;">
                        {{ $mailData['event_address'] }}
                    </a>
                @endif

                @if($mailData['event_link'])
                    <br/>
                    Join Link: <a href="{{ $mailData['event_link'] }}" target="_blank">{{ $mailData['event_link'] }}</a>
                @endif
            </li>
        @endif

        <li>
            Event Start Time: <strong>{{ \Carbon\Carbon::parse($mailData['event_time'])->format('d F Y h:i A') }}</strong>.
        </li>
    </ol>
@else
    <ol>
        @if($mailData['event_link'])
            <li>
                Join Link: <a href="{{ $mailData['event_link'] }}" target="_blank">{{ $mailData['event_link'] }}</a>
            </li>
        @endif

        <li>
            Event Start Time: <strong>{{ \Carbon\Carbon::parse($mailData['event_time'])->format('d F Y h:i A') }}</strong>.
        </li>
    </ol>
@endif <!----end online--->

                <p>Thanks & Regards,<br /><strong>MIMA</strong></p>
            </td>
        </tr>
        <tr>
            <td class="footer">
                &#xA9; <?= date("Y") ?> Event Platform. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
