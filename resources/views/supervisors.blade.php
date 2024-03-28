<!DOCTYPE html>
<html>
<head>
    <title>Supervisors</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
        /* User card styles */
        .user-card {
            width: 30%; /* Adjust as needed */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            box-sizing: border-box;
            display: inline-block;
            vertical-align: top;
        }
        .user-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .user-info p {
            margin: 0;
            color: #666;
        }
           
    </style>
</head>
<body>
    <h1>Supervisors</h1>
    <ul>
        @foreach  ($supervisors as $member)
        <div class="user-card"> 
            <h3>{{ $member->name }} </h3>
            <div class="user-info">
                <p> Email: {{ $member->email }}</p>
            </div>
        </div>
        @endforeach
    </ul>
</body>
</html>
