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
       

         /* Button styles */
        .btn-container a, .btn-container button {
            padding: 15px 105px;
            margin: 25px 2px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        .btn-container a:hover, .btn-container button:hover {
            background-color: #485052;
        }
         /* Add user Button */
         .add-user-button {
            font-size: 15px;
            position: fixed;
            bottom: 20px;
            right: 10px;
            padding: 15px 25px;
            background-color: rgb(51, 51, 51, 0.7);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out; /* Add smooth transition */
        }

        /* Add hover effect */
        .add-user-button:hover {
            background-color: #1a1b1c;
            transform: translateY(-5px); /* Move button up on hover */
        }
      
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #464444;
            color:white; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px #0000001a;
            z-index: 9999;
        }
        .popup h2 {
            margin-top: 0;
        }
        .closeadduser {
            color: #020202;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closeadduser:hover,
        .closeadduser:focus {
            color: #ad2525;
            text-decoration: none;
            cursor: pointer;
        }

        /* Styles for form inputs and buttons */
        input[type="text"],
        textarea,
        input[type="email"],
        input[type="password"],
        select,
        .button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 20px; /* Adjust the border radius to make the edges curved */
            padding: 10px 20px; /* Adjust the padding to make the button shorter */
        }

        .button[type="submit"]:hover {
            background-color: #111212;
        }

        .alert {
            position: relative;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .close-btn {
            padding: 5px 10px;
            border: 1px solid #c3e6cb;
            border-radius: 3px;
            background-color: #c3e6cb;
            color: #364739;
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #d43024;
        }
        
        /*delete button*/
        .deletebtn {
            font-size: 15px;
            margin-left: 320px;
            padding: 5px 10px;
            background-color: rgb(51, 51, 51, 0.7);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Delete hover effect */
        .deletebtn:hover {
            background-color: #ee2038;
            color: black;
        }

    </style>
</head>
<body>
    
    <!-- Navbar -->
    @include('navbar')

    <!-- Display success message if exists -->
    @if (session('success'))
    <div class="alert" id="successAlert">
        {{ session('success') }}
        <span class="close-btn" onclick="closeAlert('successAlert')">Close</span>
    </div>
    @endif
    
    <script>
        // Function to close the alert
        function closeAlert(alertId) {
            var alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.style.display = 'none'; // Hide the alert
            }
        }
    </script>

    
    <!-- Content -->
    <div class="btn-container">
        <a href="{{ route('users') }}" class="btn">All Users</a>
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
                <div class="user-card">
                    <h3>{{ $user->name }}</h3>
                    <div class="user-info">
                        <p>Email: {{ $user->email }}</p>
                        <p>Role: {{ $user->role }}</p>
                    </div>
                    <!-- Delete form -->
                    <form action="{{ route('deleteUser.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="deletebtn" type="submit" onclick="return confirm('Are you sure you want to delete this user?')">
                            <span class="icon">&#128465;</span>Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </ul>
    </div>

    

    <!-- Button to add users -->
    <button class="add-user-button" onclick="togglePopup()">Add User</button>

    <!-- Popup for adding users -->
    <div id="addUserPopup" class="popup">
        <span class="closeadduser" onclick="togglePopup()">&times;</span>
        <center><h2>Add User</h2></center>
        <form id="addUserForm" action="{{ route('addUser') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="project_member">Project Member</option>
                <option value="examiner">Examiner</option>
                <option value="supervisor">Supervisor</option>
                <option value="student">Student</option>
            </select>
            <button type="submit" class="button">Submit</button>
        </form>
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
        
        // Function to toggle the popup
        function togglePopup() {
            var popup = document.getElementById('addUserPopup');
            if (popup.style.display === "none" || popup.style.display === "") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        }

        
        
    </script>
</body>
</html>
