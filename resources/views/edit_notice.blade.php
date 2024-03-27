<!DOCTYPE html>
<html>
<head>
    <title>Edit Notice</title>
    <style>
        /* Styles for modal */
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

<!-- The Modal -->
<div id="editModal" class="modal1" style="display: none;">

    <!-- Modal content -->
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
    // Function to close the edit modal
    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }
</script>

</body>
</html>
