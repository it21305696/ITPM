<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Excel Sheets - Semester 2</title>
</head>
<body>
    <h2>Uploaded Excel Sheets - Semester 2</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($spreadsheets as $spreadsheet)
            @if($spreadsheet->semester === 'semester2')
                <li>
                    <a href="{{ route('download', $spreadsheet->id) }}">{{ $spreadsheet->name }}</a>
                    (Type: {{ $spreadsheet->document_type }}, Status: {{ $spreadsheet->status }})
                </li>
            @endif
        @endforeach
    </ul>
</body>
</html>
