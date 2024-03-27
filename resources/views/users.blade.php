<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
       /* Navbar styles */
        .navbar {
            background-color: #333;
            overflow: hidden;
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
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('admin_home') }}">Home</a>
        <a href="{{route('users')}}">Users</a>
        <a href="#">Semesters</a>
    </div>

    <!-- Content -->
    <h1>User Management</h1>
    <div>
        
        <button onclick="getProjectMembers()">Project Members</button>
        <button onclick="getExaminers()">Examiners</button>
        <button onclick="getSupervisors()">Supervisors</button>
        <button onclick="getStudents()">Students</button>
    </div>
    <div id="user-list">
        <h1> All Users </h1>
            <!-- User list will be displayed here -->
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->name }} - {{ $user->email }} - {{ $user->role }}</li>
                @endforeach
            </ul>
        
    </div>

    <!-- Script for fetching user lists -->
    <script>
        function getProjectMembers() {
            fetch('/admin/project-members')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-list').innerHTML = data;
                });
        }

        function getExaminers() {
            fetch('/admin/examiners')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-list').innerHTML = data;
                });
        }

        function getSupervisors() {
            fetch('/admin/supervisors')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-list').innerHTML = data;
                });
        }

        function getStudents() {
            fetch('/admin/students')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-list').innerHTML = data;
                });
        }
        
    </script>
</body>
</html>
