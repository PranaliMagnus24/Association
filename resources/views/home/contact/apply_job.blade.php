@include('home.contact.layouts.header')

<tr>
    <td class="content">
        <p>Job Application,</p>
        <p><strong>Name: <span>{{ $applyJob->name }}</span></strong></p>
        <p><strong>Email: <span>{{ $applyJob->to }}</span></strong></p>
        <p><strong>Phone: <span>{{ $applyJob->phone }}</span></strong></p>
        <p><strong>Subject: <span>{{ $applyJob->subject }}</span></strong></p>

        <blockquote>
            <p>{{ $applyJob->message }}</p>
        </blockquote>

        <p>Feel free to reach out to the user at their email address for more details.</p>
        <p>Thanks,<br>The Team</p>
    </td>
</tr>


@include('home.contact.layouts.footer')
