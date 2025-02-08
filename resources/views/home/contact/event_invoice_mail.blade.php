{{--<!DOCTYPE html>
<html>
<head>
    <title>Event Invoice</title>
</head>
<body>
    <p>Dear {{ $invoiceData['name'] }},</p>

    <p>Thank you for registering for <strong>{{ $invoiceData['event_title'] }}</strong>.</p>

    <p><strong>Event Details:</strong></p>
    <ul>
        <li><strong>Event Name:</strong> {{ $invoiceData['event_title'] }}</li>
        <li><strong>Name:</strong> {{ $invoiceData['name'] }}</li>
        <li><strong>Phone:</strong> {{ $invoiceData['phone'] }}</li>
        <li><strong>Email:</strong> {{ $invoiceData['email'] }}</li>
        <li><strong>Amount Paid:</strong> ₹{{ number_format($invoiceData['event_amount'], 2) }}</li>
        <li><strong>Event Date:</strong> {{ $invoiceData['event_date'] }}</li>
        @if($invoiceData['event_address'])
            <li><strong>Event Address:</strong> {{ $invoiceData['event_address'] }}</li>
        @endif
    </ul>

    <p>Please find your invoice attached.</p>

    <p>Best regards,<br>Event Team</p>
</body>
</html>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Invoice</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #F4F4F4; margin: 0; padding: 0; color: #333;" class="mt-5">
<article>
    <table style="width: 100%; max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr>
            <th colspan="2" style="text-align: center; padding: 10px 0; font-size: 18px; color: #2C3E50;">
    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
        @if ($invoiceData['association_logo'])
            <img src="{{ $invoiceData['association_logo'] }}" alt="Association Logo" style="max-width: 50px;">
        @endif
        <span>{{ $invoiceData['association_name'] }}</span>
    </div>
</th>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding: 10px 0; font-size: 12px; color: #2C3E50;">
                {{ $invoiceData['association_address'] }}
                </td>
            </tr>
            <tr>
                @if(!empty($invoiceData['gst_number']))
                <td colspan="2" style="text-align: center; padding: 10px 0; font-size: 12px; color: #2C3E50;">
                    {{ $invoiceData['gst_number'] }}
                </td>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 8px 10px; font-weight: bold;">Payment Date & Time</td>
                <td style="padding: 8px 10px;">{{ $invoiceData['event_payment_date'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 10px; font-weight: bold;">Billing To</td>
                <td style="padding: 8px 10px;">
                    {{ $invoiceData['name'] }}<br>
                    {{ $invoiceData['phone'] }}<br>
                    {{ $invoiceData['email'] }}<br>
                    {{ $invoiceData['event_date'] }}
                </td>
            </tr>
            @if ($invoiceData['event_address'])
            <tr>
                <td style="padding: 8px 10px; font-weight: bold;">Event Address</td>
                <td style="padding: 8px 10px;">{{ $invoiceData['event_address'] }}</td>
            </tr>
            @endif
        </tbody>
    </table>

    <table style="width: 100%; max-width: 600px; margin: 20px auto; border-collapse: collapse;">
        <thead>
            <tr>
               <th style="background-color: #2C3E50; color: #fff; padding: 10px; text-align: left;">Description</th>
                <th style="background-color: #2C3E50; color: #fff; padding: 10px; text-align: left;">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;"> {{ $invoiceData['event_title'] }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: right;">
                    Rs. {{ number_format($invoiceData['event_amount'], 2) }}
                </td>
            </tr>

        </tbody>
    </table>

    <table style="width: 100%; max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
        <tr>
            <td style="font-size: 18px; font-weight: bold; padding: 10px; width: 50%;">Total Paid</td>
            <td style="font-size: 18px; font-weight: bold; padding: 10px; text-align: right;">
                Rs. {{ number_format($invoiceData['event_amount'], 2) }}
            </td>
        </tr>
    </table>

    <footer style="text-align: center; font-size: 12px; color: #aaa; padding: 10px 0;">
        <p>&#xA9; {{ date("Y") }} Event Platform. All rights reserved.</p>
    </footer>
</article>
</body>
</html>
