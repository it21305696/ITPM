<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        /* Navbar styles */
        .navbar {
            background-color: #333;
            overflow: hidden;
            margin-bottom: 20px; /* Add margin to separate the navbar from the content */
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin_home') }}">Home</a>
            <a href="{{ route('users') }}">Users</a>
            <a href="#">Semesters</a>
                
        </div>
    </nav>
    
    

</body>
</html>
