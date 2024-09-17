<!DOCTYPE html>
<html>
<head>
    <title>among us</title>
</head>
<body>
    <h1>A form was submitted</h1>
    <p><strong>First Name:</strong> {{ $formData['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $formData['last_name'] }}</p>
    <p><strong>Phone:</strong> {{ $formData['phone'] }}</p>
    <p><strong>Comment:</strong> {{ $formData['comment'] }}</p>
    <p><strong>Photo:</strong> <a href="{{ asset('storage/' . $formData['photo']) }}">photo</a></p>
</body>
</html>
