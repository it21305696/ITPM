<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Marks Form</title>
</head>
<body>
    <h1>Enter Marks</h1>

    <form method="POST" action="{{ route('marks.store') }}">
        @csrf

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
        <br><br>

        <div class="form-group">
            <label for="semester">Select Semester:</label>
            <select name="semester" id="semester" required>
                <option value="semester1">Semester 1</option>
                <option value="semester2">Semester 2</option>
            </select>
        </div>
        <br><br>

        <div class="form-group">
            <label for="document_type">Document Type:</label>
            <select name="document_type" id="document_type" required>
                <option value="">Select Document Type</option>
                <option value="Proposal">Proposal Presentation</option>
                <option value="Progress 1">Progress 1 Presentation</option>
                <option value="Progress 2">Progress 2 Presentation</option>
                <option value="Final">Final Presentation</option>
                <option value="Website">Website</option>
                <option value="Project charter">Project Charter Report</option>
                <option value="Status document 1">Status Document 1 Report</option>
                <option value="Logbook">Log Book Report</option>
                <option value="Proposal document">Proposal Document Report</option>
                <option value="Status document 2">Status Document 2 Report</option>
                <option value="Final Thesis">Final Thesis Report</option>
            </select>
        </div>
        <br><br>

        <label for="group_id">Group ID:</label>
        <input type="text" id="group_id" name="group_id" required>
        <br><br>

        <h2>Enter Students' Information</h2>

        @for ($i = 1; $i <= 4; $i++)
            <label for="student{{ $i }}_it_no">Student {{ $i }} IT No:</label>
            <input type="text" id="student{{ $i }}_it_no" name="student{{ $i }}_it_no" required>
            <br>
            <label for="student{{ $i }}_grade">Student {{ $i }} Grade:</label>
            <input type="text" id="student{{ $i }}_grade" name="student{{ $i }}_grade" required>
            <br><br>
        @endfor

        <button type="submit">Submit</button>
    </form>
</body>
</html>
