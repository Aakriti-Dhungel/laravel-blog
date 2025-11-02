<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mail</title>
</head>

<body>
    <h2>New Contact Message from Digi Nepal</h2>

    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>