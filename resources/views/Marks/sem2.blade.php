<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester 2 Mark Sheets</title>
</head>
<body>
    <h1>Semester 2 Mark Sheets</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Document Type</th>
                <th>Group ID</th>
                <th>Student IT No</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->date }}</td>
                    <td>{{ $mark->document_type }}</td>
                    <td>{{ $mark->group_id }}</td>
                    <td>{{ $mark->student1_it_no }}</td>
                    <td>{{ $mark->student1_grade }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $mark->student2_it_no }}</td>
                    <td>{{ $mark->student2_grade }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $mark->student3_it_no }}</td>
                    <td>{{ $mark->student3_grade }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $mark->student4_it_no }}</td>
                    <td>{{ $mark->student4_grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
