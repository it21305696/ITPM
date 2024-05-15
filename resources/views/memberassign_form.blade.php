<!DOCTYPE html>
<html>
<head>   
    <title>Assign Project Task</title>
    <style>
        

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #d4cfcf;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select, textarea, input[type="text"], input[type="date"], button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #020204;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #134a96;
        }
    </style>
</head>
<body>
    

    <form method="POST" action="{{ route('assignTask') }}">
        @csrf
        <h2 style="text-align: center;">Assign Project Members</h2>
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
                <option value="Progress 1">Progress 1 Presentation</option>
                <option value="Progress 2">Progress 2 Presentation</option>
                <option value="Final">Final Presentation</option>
                <option value="Topicassessment form">Topic Assessment Form Report</option>
                <option value="Project charter">Project Charter Report</option>
                <option value="Status document 1">Status Document 1 Report</option>
                <option value="Logbook">Log Book Report</option>
                <option value="Proposal document">Proposal Document Report</option>
                <option value="Status document 2">Status Document 2 Report</option>
                <option value="Final Thesis">Final Thesis Report</option>
            </select>
        </div>

        <div class="form-group">
            <label for="task_description">Task Description:</label>
            <textarea name="task_description" id="task_description" rows="2" required></textarea>
        </div>

        <button type="submit">Assign Task</button>
    </form>
</body>
</html>
