<!DOCTYPE html>
<html>
<head>
    <title>Upload Excel Sheet</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="file">Choose Excel Sheet:</label>
        <input type="file" id="file" name="file" accept=".xls,.xlsx" required>
        <br><br>

        <label for="document_type">Document Type:</label>
        <select id="document_type" name="document_type">
            <option value="presentation">Presentation</option>
            <option value="report">Report</option>
        </select>
        <br><br>

        <label for="status">Document name:</label>
        <input type="text" id="docname" name="docname" required>
        <br><br>

        <label for="semester">Semester:</label>
        <select id="semester" name="semester">
            <option value="semester1">Semester 1</option>
            <option value="semester2">Semester 2</option>
        </select>
        <br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
