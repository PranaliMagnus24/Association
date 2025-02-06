@include('home.contact.layouts.header')

<tr>
    <td class="content">
        <p style="font-size: 16px; color: #333;">
            <strong>{{ $interviewDetails['action'] == 'rejected' ? 'Application Rejected' : 'Interview Scheduled' }}</strong>
        </p>
        <p style="font-size: 14px; color: #333;">
            Dear <strong>{{ $interviewDetails['name'] }}</strong>,
        </p>

        @if($interviewDetails['action'] == 'rejected')
            <p style="font-size: 14px; color: #333;">We regret to inform you that your application has been rejected.</p>
            <p style="font-size: 14px; color: #333;">Thank you for your interest.</p>
        @else
            <p style="font-size: 14px; color: #333;">Your interview has been scheduled. Below are the details:</p>
            <ul style="font-size: 14px; color: #333;">
                <li><strong>Date:</strong> {{ $interviewDetails['interview_date'] }}</li>
                <li><strong>Time:</strong> {{ $interviewDetails['interview_time'] }}</li>
                <li><strong>Address:</strong> {{ $interviewDetails['interview_address'] }}</li>
                <li><strong>Instructions:</strong> {{ $interviewDetails['interview_instructions'] }}</li>
            </ul>
            <p style="font-size: 14px; color: #333;">Best regards,</p>
        @endif

        <p style="font-size: 14px; color: #333;">{{ $interviewDetails['company_name'] }}</p>
    </td>
</tr>

@include('home.contact.layouts.footer')
