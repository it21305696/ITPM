<!DOCTYPE html>
<html>
<head>
    <title>Navigation Bar</title>
    <style>
        /* Navbar styles */
        .navbar {
            background-color: #000000; /* Adjust the alpha value (last parameter) for transparency */
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

        

        /* Logout Button */
        .logout-btn {
            float: right; /* Align the button to the right */
            margin-top: 15px; /* Optional: Add top margin for spacing */
        }

        .logout-btn a {
            font-size: 14px;
            color: #f4f4f9;
            background-color: #5d5de4;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px; /* Optional: Add border-radius for rounded corners */
            transition: background-color 0.3s, color 0.3s; /* Add transition for smoother hover effect */
        }

        .logout-btn a:hover {
            background-color: #3b3bae; /* Change background color on hover */
            color: white; /* Change text color on hover */
        }
        
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="{{ route('admin_home') }}">Home</a>
            <a href="{{ route('users') }}">Users</a>
            <div class="dropdownnav">
                <button class="dropbtn">Semesters</button>
                <div class="dropdownnav-content">
                    <a href="{{route('Marks.sem1')}}">Semester 1</a>
                    <a href="#">Semester 2</a>
                </div>
            </div>
            <a href="{{ route('assigned_tasks') }}">Tasks</a>
    
            <!-- Logout Button -->
            <div class="logout-btn">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

</body>
</html>
