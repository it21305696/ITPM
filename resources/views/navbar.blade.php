<!DOCTYPE html>
<html>
<head>
    <title>Navigation Bar</title>
    <style>
        /* Navbar styles */
        .navbar {
            top: 0;
            background-color: rgba(51, 51, 51, 0.8); /* Adjust the alpha value (last parameter) for transparency */
            overflow: hidden;
            margin-bottom: 20px;
            width: 100%; /* Ensure the navbar spans the entire width of the page */
            z-index: 1000;
            border-bottom: 1px solid #333; /* Add a border to the bottom of the navbar */
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 30px 30px;
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
