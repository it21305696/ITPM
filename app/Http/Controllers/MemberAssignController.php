<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class MemberAssignController extends Controller
{
    public function showAssignmentForm()
    {
        // Fetch project members who have the role of "project member"
        $projectMembers = User::where('role', 'project_member')->get();

        return view('memberassign_form', [
            'projectMembers' => $projectMembers
        ]);
    }

    public function assignTask(Request $request)
    {
        // Validation
        $request->validate([
            'project_member_id' => 'required|exists:users,id',
            'task_type' => 'required|in:marking_rubric,schedule',
            'doc_type' => 'required|in:Proposal,Progress1,Progress2,Final,Topicassessmentform,Projectcharter,Statusdocument1,Logbook,Proposaldocument,Statusdocument2,Finalthesis',
            'task_description' => 'required|string'
        ]);

        // Create a new Task record based on the form data
        $task = new Task();
        $task->user_id = $request->input('project_member_id');
        $task->task_type = $request->input('task_type');
        $task->doc_type = $request->input('doc_type');
        $task->description = $request->input('task_description');
        $task->save();

        // Redirect to assigned_tasks view
        return redirect()->route('assigned_tasks')->with('success', 'Task assigned successfully!');
    }

    public function viewAssignedTasks()
    {
        // Retrieve assigned tasks (update this query based on your Task model and relationships)
        $assignedTasks = Task::all();

        // Fetch project members who have the role of "project member"
        $projectMembers = User::where('role', 'project_member')->get();

        // Render the assigned_tasks view and pass assigned tasks and project members data
        return view('assigned_tasks', [
            'assignedTasks' => $assignedTasks,
            'projectMembers' => $projectMembers
        ]);
    }

    public function destroy(Task $task)
    {
        // Delete the notice
        $task->delete();

        // Redirect back to admin home page with success message
        return redirect()->route('assigned_tasks')->with('success', 'Notice deleted successfully!');
    }
}
