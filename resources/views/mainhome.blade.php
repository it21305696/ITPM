<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        /* Navbar styles */
        .navbar {
            background-color: rgba(19, 19, 19, 0.8); /* Adjust the alpha value (last parameter) for transparency */
            overflow: hidden;
            margin-bottom: 20px;
            width: 100%; /* Ensure the navbar spans the entire width of the page */
            z-index: 1000;
            border-bottom: 1px solid #333; /* Add a border to the bottom of the navbar */
        }
        .navbar a {
            font-size: 16px;
            float: left;
            display: flex;
            color: #f2f2f2;
            text-align: center;
            padding: 30px 50px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Dropdown styles */
        .dropdownnav {
            float: left;
            overflow: hidden;
        }
        .dropdownnav .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: #f2f2f2;
            padding: 30px 30px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .dropdownnav-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }
        .dropdownnav-content a {
            float: none;
            color: #f2f2f2;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .dropdownnav-content a:hover {
            background-color: #ddd;
            color: black;
        }
        .dropdownnav:hover .dropdownnav-content {
            display: block;
        }
    </style>
 </head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#">Home</a>
            <a href="#">Library</a>
            <div class="dropdownnav">
                <button class="dropbtn">Semesters</button>
                <div class="dropdownnav-content">
                    <a href="#">Semester 1</a>
                    <a href="#">Semester 2</a>
                </div>
            </div>
            <a href="#">Tasks</a>
        </div>
    </nav>

    <div class="login">
    <a href="{{ route('login') }}">Login</a> 
    </div>
    
    </body>
    </html>
