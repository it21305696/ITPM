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
        .notice-card-footer {
            margin-top: 10px;
            text-align: right;
        }
        .notice-card-footer a,
        .notice-card-footer button {
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
        }
        .notice-card-footer a:hover,
        .notice-card-footer button:hover {
            background-color: #007bff;
            color: #fff;
        }
        .notice-card-footer button {
            background-color: #dc3545;
            color: #fff;
        }
        .icon {
            margin-right: 5px;
        }

        /* Add Notice Button */
        .add-notice-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out; /* Add smooth transition */
        }

        /* Add hover effect */
        .add-notice-button:hover {
            transform: translateY(-5px); /* Move button up on hover */
        }

        .modal1 {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
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
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
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
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .button2[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar (same as before) -->
    <div class="navbar">
        <a href="{{ route('admin_home') }}">Home</a>
        <a href="{{route('users')}}">Users</a>
        <a href="#">Semesters</a>
    </div>

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
                    <p>{{ $notice->description }}</p>
                    <p><strong>Release Date:</strong> {{ $notice->release_date }}</p>
                    <div class="notice-card-footer">
                       <!-- Edit button -->
                        <button onclick="openEditModal('{{ $notice->title }}', '{{ $notice->description }}', '{{ $notice->release_date }}', '{{ $notice->id }}')">
                            <span class="icon">&#9998;</span>Edit
                        </button>
                        <!-- Delete form (same as before) -->
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
    <a href="{{ route('create_notice') }}" class="add-notice-button">Add Notice</a>

    <!-- Edit Modal -->
    <div id="editModal" class="modal1" style="display: none;">
        <div class="modal-content1">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h1>Edit Notice</h1>
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
    </script>
    
</body>
</html>
