<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Semester 1 Mark Sheet Report</h1>

    <table>
        <thead>
            <tr>
                <th>Group ID</th>
                <th>IT No</th>
                <th>Proposal</th>
                <th>Progress 1</th>
                <th>Status Report 1</th>
                <th>Proposal Document</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->group_id }}</td>
                    <td>{{ $mark->student1_it_no }}</td>
                    <td>{{ $mark->student1_grade }}</td>
                    <td>{{ $mark->student1_grade }}</td>
                    <td>{{ $mark->student1_grade }}</td>
                    <td>{{ $mark->student1_grade }}</td>
                </tr>
                <tr>
                    <td>{{ $mark->group_id }}</td>
                    <td>{{ $mark->student2_it_no }}</td>
                    <td>{{ $mark->student2_grade }}</td>
                    <td>{{ $mark->student2_grade }}</td>
                    <td>{{ $mark->student2_grade }}</td>
                    <td>{{ $mark->student2_grade }}</td>
                    
                </tr>
                <tr>
                    <td>{{ $mark->group_id }}</td>
                    <td>{{ $mark->student3_it_no }}</td>
                    <td>{{ $mark->student3_grade }}</td>
                    <td>{{ $mark->student3_grade }}</td>
                    <td>{{ $mark->student3_grade }}</td>
                    <td>{{ $mark->student3_grade }}</td>
                    
                </tr>
                    <td>{{ $mark->group_id }}</td>
                    <td>{{ $mark->student4_it_no }}</td>
                    <td>{{ $mark->student4_grade }}</td>
                    <td>{{ $mark->student4_grade }}</td>
                    <td>{{ $mark->student4_grade }}</td>
                    <td>{{ $mark->student4_grade }}</td>
                    
                    <td>
                        {{ 
                            $mark->student1_grade +
                            $mark->student2_grade +
                            $mark->student3_grade +
                            $mark->student4_grade
                        }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
