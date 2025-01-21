@include('home.contact.layouts.header')

<tr>
    <td class="content">
        <p>We received a contact request from,</p>
        <p><strong>Name: <span>{{ $userName }}</span></strong></p>
        <p><strong>Email: <span>{{ $userEmail }}</span></strong></p>
        <p><strong>Phone: <span>{{ $userPhone }}</span></strong></p>
        <p><strong>Subject: <span>{{ $sub }}</span></strong></p>


        <blockquote>
            <p>{{ $msg }}</p>
        </blockquote>
        <p>Feel free to reach out to the user at their email address for more details.</p>
        <p>Thanks,<br>The Team</p>
    </td>
</tr>

@include('home.contact.layouts.footer')
