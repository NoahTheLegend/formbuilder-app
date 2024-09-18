<!DOCTYPE html>
<html>
<head>
    <title>among us</title>
</head>
<body>
    <h1>A form was submitted</h1>
    @foreach ($formData as $data)
        <p>{{$data}}</p>
    @endforeach
</body>
</html>
