<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $contactForm->name }}</p>
    <p><strong>Phone:</strong> {{ $contactForm->phone }}</p>
    <p><strong>Email:</strong> {{ $contactForm->email }}</p>
    <p><strong>Message:</strong> {{ $contactForm->message }}</p>
</body>
</html>
