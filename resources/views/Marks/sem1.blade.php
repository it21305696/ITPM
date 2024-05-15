<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester 1 Mark Sheets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }


        /* Style for container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Navbar styles */
        .navbar {
            background-color: #21553a;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        /* Report button styles */
        .generate-pdf-btn {
            margin-top: 20px;

        }
        .report-btn {
            text-align: right;
        }

        .report-btn a {
            border-radius: 6px;
            padding: 5px 5px;
            background-color: #2eda81;
            color: white;
            font-size: 14px;
            text-decoration: none;
        }

        .report-btn a:hover {
            background-color: #1a422b;
        }

        /* Card styles */
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #333;
            margin-bottom: 15px;
        }

        /* Generate PDF button styles */
        
    </style>
</head>
<body>

    <!-- Navbar -->
    @include('navbar')
    
    <h1>Semester 1 Mark Sheets</h1>

    <div class="container">
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

        <div class="report-btn">
            <a href="{{ route('generate.report.sem1') }}" class="generate-pdf-btn">Generate Report</a>
        </div>
    </div>

</body>
</html>
