@include('home.contact.layouts.header')

<tr>
    <td class="content">
        <p>Hi {{ $msg }},</p>
        <p>We received a contact request from {{ $userName }} (Email: {{ $userEmail }}).</p>
        <p>Here’s the message they sent:</p>
        <blockquote>
            <p>{{ $userMessage }}</p>
        </blockquote>
        <p>Feel free to reach out to the user at their email address for more details.</p>
        <p>Thanks,<br>The Team</p>
    </td>
</tr>

@include('home.contact.layouts.footer')
