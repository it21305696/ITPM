<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Excel Sheets</title>
</head>
<body>
    <h2>Uploaded Excel Sheets</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <label for="semester_filter">Filter by Semester:</label>
    <select id="semester_filter" onchange="location = this.value;">
        <option value="{{ route('list') }}">All Semesters</option>
        <option value="{{ route('list', ['semester' => 'semester1']) }}">Semester 1</option>
        <option value="{{ route('list', ['semester' => 'semester2']) }}">Semester 2</option>
    </select>
    <br><br>

    <ul>
        @foreach($spreadsheets as $spreadsheet)
            @if(request('semester') === null || $spreadsheet->semester === request('semester'))
                <li>
                    <a href="{{ route('download', $spreadsheet->id) }}">{{ $spreadsheet->name }}</a>
                    (Type: {{ $spreadsheet->document_type }}, Status: {{ $spreadsheet->status }})
                </li>
            @endif
        @endforeach
    </ul>
</body>
</html>
