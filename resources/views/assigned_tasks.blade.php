<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assigned Tasks</title>
    <style>
        /* Shared Styles for Navbar and Content */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }     
        .container {
            max-width: 800px;
            
            padding: 20px;
        }
        
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
        
        .row {
            margin-top: 20px;
        }
        
        /* Alert Styles */
        .alert {
            position: relative;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        
        .close-btn {
            padding: 5px 10px;
            border: 1px solid #c3e6cb;
            border-radius: 3px;
            background-color: #c3e6cb;
            color: #364739;
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
        }
        
        .close-btn:hover {
            background-color: #d43024;
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
        @include('navbar')

    <!-- Display success message if exists -->
    @if (session('success'))
    <div class="alert" id="successAlert">
        {{ session('success') }}
        <span class="close-btn" onclick="closeAlert('successAlert')">Close</span>
    </div>
    @endif

    <script>
        // Function to close the alert
        function closeAlert(alertId) {
            var alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.style.display = 'none'; // Hide the alert
            }
        }
    </script>
    
    <!-- Content -->
    <div class="container mt-4">
        <h2>Assigned Tasks</h2>

        <div class="row mt-4">
            @foreach ($assignedTasks as $task)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->user->name }}</h5>
                        <p class="card-text"><strong>Task Type:</strong> {{ ucfirst($task->task_type) }}</p>
                        <p class="card-text"><strong>Document Type:</strong> {{ ucfirst($task->doc_type) }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
                        <!-- Delete form -->
                        <form action="{{ route('admin_task.destroy', $task->id) }}" method="POST" style="position: relative;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this notice?')" style="position: absolute; top: 10px; right: 10px;">
                                <span class="icon">&#128465;</span>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
