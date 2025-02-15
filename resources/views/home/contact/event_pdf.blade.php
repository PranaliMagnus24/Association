<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <title>Event Confirmation PDF</title>
    <style>
   @page {
            size: statement; /* Fix Page Size */
            margin: 15mm; /* Proper spacing */
        }


    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: white !important;
        width: 100%;
    }

    .wrapper {
        width: 100%;
        padding: 5px;
        margin: 0 auto;
        background: white;
        text-align: center;
    }

    .content {
        width: 100%;
        max-width: 100%;
        padding: 20px;
        margin: auto;
    }

    .header {
        padding: 10px;
        text-align: center;
    }

    .event-title {
        font-size: 18px;
        font-weight: bold;
        margin: 10px 0;
    }

    .name, .id-number {
        font-size: 16px;
        font-weight: bold;
    }

    .qrcode {
        text-align: center;
        margin: 15px 0;
    }

    .qrcode img {
        max-width: 150px;
        display: block;
        margin: auto;
    }

    .self-employee {
        background-color: green;
        color: white;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        display: inline-block;
        margin-top: 10px;
    }

    .validity {
        color: red;
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
    }

    .footer {
        font-size: 12px;
        color: #666;
        text-align: center;
        padding: 10px 0;
        margin-top: 15px;
    }

    .event-address {
        color: red;
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .event-address::before {
        content: '\1F4CD';
        margin-right: 5px;
    }

    .event-link {
        font-size: 14px;
        font-weight: bold;
        margin-top: 10px;
        color: blue;
    }
    .container {
        width: 100%;
        padding: 15px;
        box-sizing: border-box;
    }

    h1, p {
        font-size: 16px;
    }

    @media only screen and (max-width: 599px) {
        .wrapper {
            width: 90%;
            padding: 15px;
        }
        .event-title {
            font-size: 16px;
        }
        .name, .id-number {
            font-size: 14px;
        }
        .self-employee {
            font-size: 12px;
            padding: 8px;
        }
        .validity {
            font-size: 12px;
        }
    }

    @media (max-width: 768px) {
        body {
            font-size: 14px;
        }
        .container {
            width: 100%;
            padding: 10px;
        }
    }
    @media (min-width: 769px) {
        body {
            font-size: 16px;
        }
        .container {
            width: 80%;
            padding: 20px;
        }
    }
    @media (max-width: 375px) {
        body {
            font-size: 12px;  /* Smaller text for mobile */
        }
        h1 {
            font-size: 18px;
        }
        .container {
            padding: 10px;
        }
    }
</style>

</head>
<body>
<div class="wrapper">
    <div class="header">
        <img src="https://assoc.mytasks.in/homecss/assets/images/email/email-banner.png" alt="Header Image" style="max-width: 150px;">
    </div>

    <p style="color:blue;">{{ $mailData['valid_period'] }}</p>

    @if($mailData['event_address'])
        <p class="event-address">{{ $mailData['event_address'] }}</p>
    @elseif($mailData['event_link'])
        <p class="event-link">Join Link: <a href="{{ $mailData['event_link'] }}" target="_blank">{{ $mailData['event_link'] }}</a></p>
    @endif

    <h3 class="event-title">{{ $mailData['event_title'] }}</h3>

    <hr style="margin-bottom: 10px;">

    <p class="name" style="margin-bottom: 10px; color:blue;"><strong>{{ $mailData['name'] }}</strong></p>

    <p style="margin-bottom: 10px; color:blue;">{{ $mailData['city'] }}</p>
    <hr style="margin-top: 10px; margin-bottom: 10px;">

    @if(!$mailData['event_link'] && $mailData['qr_code'])
        <div class="qrcode" style="margin-top: 10px;">
            <img src="{{ $mailData['qr_code'] }}" alt="Event QR Code" style="max-width: 150px;">
        </div>
    @endif

    <div class="self-employee">Self Employee</div>

    <p class="validity" style="margin-top: 10px;">*Valid from {{ $mailData['valid_period'] }}</p>

    <p class="footer" style="margin-top: 10px;">Welcome to {{ $mailData['event_title'] }}.<br>Thank you for Registering yourself.!</p>
</div>

</body>
</html>
