<!DOCTYPE html>
<html>
<head>
    <title>Admin Home Page</title>
    <style>
        /* Styles for navbar, content, and notice cards (same as before) */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .content {
            padding: 20px;
            position: relative; /* Ensure relative positioning for absolute positioning of the button */
            margin-bottom: 100px; /* Add margin to prevent button overlap */
            
        }
        .notice-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .notice-card h3 {
            margin-top: 0;
        }
        .notice-card p {
            margin-bottom: 0;
            color: #666;
        }
        .edit-btn {
            margin-top: 10px;
            text-align: right;
        }
        .edit-btn a,
        .edit-btn button {
            margin-right: 90px;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
        }
        .edit-btn button {
            background-color: #2592db;
            color: #fff;
        }
        .edit-btn a:hover,
        .edit-btn button:hover {
            background-color: #134a96;
            color: #fff;
            transform: translateY(-5px);
        }
        .icon {
            margin-right: 5px;
        }

        .delete-btn {
            margin-top: -38.5px;
            text-align: right;
        }
        .delete-btn a,
        .delete-btn button {
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
        }
        .delete-btn button {
            background-color: #d23030;
            color: #fff;
        }
        .delete-btn a:hover,
        .delete-btn button:hover {
            background-color: #c20303;
            color: #fff;
            transform: translateY(-5px);
        }


        /* Add Notice Button */
        .add-notice-button {
            font-size: 15px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 25px;
            background-color: #3b3c3ccc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out; /* Add smooth transition */
        }

        /* Add hover effect */
        .add-notice-button:hover {
            transform: translateY(-5px); /* Move button up on hover */
            background-color: #020204;
        }

        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #3f3a3a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 9;
            color:white;
        }
        .popup h2 {
            margin-top: 0;
        }
        .close-popup {
            color: #f2e6e6;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-popup:hover,
        .close-popup:focus {
            color: #ad2525;
            text-decoration: none;
            cursor: pointer;
        }

        
         /*edit modal*/
         .modal1 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: #00000066;
            padding-top: 60px;
        }

        .modal-content1 {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
            justify-content: center;
        }
        .close {
            color: #020202;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #ad2525;
            text-decoration: none;
            cursor: pointer;
        }

            /* Style the form inputs and button */
            input[type="text"],
        textarea,
        input[type="date"],
        .button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button1[type="submit"] {
            background-color: #02172e;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            justify-content: center;
        }

        .button1[type="submit"]:hover {
            background-color: #3f4144;
            
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
    <div class="content">
        <h1>Welcome, Admin!</h1>
        
        <h2>Notices</h2>
        @if ($notices->isEmpty())
            <p>No notices found.</p>
        @else
            @foreach ($notices as $notice)
                <div class="notice-card">
                    <h3>{{ $notice->title }}</h3>
                    <p><h4>{{ $notice->description }}</h4></p>
                    <p><strong>Release Date:</strong> {{ $notice->release_date }}</p>
                    <div class="edit-btn">
                       <!-- Edit button -->
                        <button onclick="openEditModal('{{ $notice->title }}', '{{ $notice->description }}', '{{ $notice->release_date }}', '{{ $notice->id }}')">
                            <span class="icon">&#9998;</span>Edit
                        </button>
                    </div>
                    <div class="delete-btn">
                        <!-- Delete form -->
                        <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this notice?')">
                                <span class="icon">&#128465;</span>Delete
                            </button>
                        </form>
                    </div>                    
                </div>
            @endforeach
        @endif
    </div>

    <!-- Add Notice Button -->
    <button class="add-notice-button" onclick="togglePopup()">Add Notice</button>

    <!-- Popup for create notice -->
<div id="createNoticePopup" class="popup">
    <span class="close-popup" onclick="closePopup()">&times;</span>
    <h2>New Notice</h2>
    
        <form id="notice-form" action="{{ route('admin.notices.store') }}" method="POST">

        @csrf
        <label class="form-label" for="title">Title:</label>
        <input class="form-input" type="text" id="title" name="title" required>
        <label class="form-label" for="description">Description:</label>
        <textarea class="form-input" id="description" name="description" required></textarea>
        <label class="form-label" for="release_date">Release Date:</label>
        <input class="form-input" type="date" id="release_date" name="release_date" required>

        <button class="button1" type="submit">Create Notice</button>
    </form>
    </div>


    <!-- Edit Modal -->
    <div id="editModal" class="modal1" style="display: none;">
        <div class="modal-content1">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <center><h1>Edit Notice</h1></center>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <label for="editTitle">Title:</label><br>
                <input type="text" id="editTitle" name="title"><br>
                <label for="editDescription">Description:</label><br>
                <textarea id="editDescription" name="description"></textarea><br>
                <label for="editReleaseDate">Release Date:</label><br>
                <input type="date" id="editReleaseDate" name="release_date"><br><br>
                <button class="button1" type="submit">Update Notice</button>
            </form>
            
            </div>
    </div>

    <script>
        // Function to open the edit modal
        function openEditModal(title, description, releaseDate, noticeId) {
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editReleaseDate').value = releaseDate;
            document.getElementById('editForm').action = '{{ route("admin.notices.update", "") }}/' + noticeId;
            document.getElementById('editModal').style.display = 'block';
        }
    
        // Function to close the edit modal
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        
        // Function to toggle the popup
        function togglePopup() {
            var popup = document.getElementById('createNoticePopup');
            if (popup.style.display === "none" || popup.style.display === "") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        }

        // Function to close the popup
        function closePopup() {
            var popup = document.getElementById('createNoticePopup');
            popup.style.display = "none";
        }
       

    </script>
    
</body>
</html>
