<!DOCTYPE html>
<html>
<head>
        
    <title>Assign Project Task</title>
    <style>
        
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>

<!-- Navbar -->
@include('navbar')

<h2>Assign Project Task</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('assignTask') }}">
    @csrf

    <div class="form-group">
        <label for="project_member_id">Select Project Member:</label>
        <select name="project_member_id" id="project_member_id" required>
            <option value="">Select Project Member</option>
            @foreach ($projectMembers as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="task_type">Task Type:</label>
        <select name="task_type" id="task_type" required>
            <option value="">Select Task Type</option>
            <option value="marking_rubric">Marking Rubric</option>
            <option value="schedule">Presentation Schedule</option>
        </select>
    </div>

    <div class="form-group">
        <label for="doc_type">Document Type:</label>
        <select name="doc_type" id="doc_type" required>
            <option value="">Select Document Type</option>
            <option value="Proposal">Proposal Presentation</option>
            <option value="Progress1">Progress 1 Presentation</option>
            <option value="Progress2">Progress 2 Presentation</option>
            <option value="Final">Final Presentation</option>
            <option value="Topicassessmentform">Topic assessment form Report</option>
            <option value="Projectcharter">Project charter Report</option>
            <option value="Statusdocument1">Status document 1 Report</option>
            <option value="Logbook">Log book Report</option>
            <option value="Proposaldocument">Proposaldocument Report</option>
            <option value="Statusdocument2">Status document 2 Report</option>
            <option value="FinalThesis">Final Thesis Report</option>
        </select>
    </div>

    <div class="form-group">
        <label for="task_description">Task Description:</label>
        <textarea name="task_description" id="task_description" rows="4" required></textarea>
    </div>

    <button type="submit">Assign Task</button>
</form>

</body>
</html>
