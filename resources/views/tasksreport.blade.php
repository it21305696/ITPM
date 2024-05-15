<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Tasks Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Assigned Tasks Report</h1>
    <table>
        <thead>
            <tr>
                <th>Member Name</th>
                <th>Task Type</th>
                <th>Document Type</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedTasks as $task)
                <tr>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ ucfirst($task->task_type) }}</td>
                    <td>{{ ucfirst($task->doc_type) }}</td>
                    <td>{{ $task->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
