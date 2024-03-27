<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
    </style>
</head>
<body>
    <h1>Students</h1>
    <ul>
        @foreach ($students as $member)
            <li>{{ $member->name }} - {{ $member->email }}</li>
        @endforeach
    </ul>
</body>
</html>
