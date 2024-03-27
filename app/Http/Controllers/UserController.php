<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getProjectMembers()
    {
         // Retrieve project members from the database based on role
        $project_members = User::where('role', 'project_member')->get();
        
        // Pass the project members data to the view
        return view('project_members', ['project_members' => $project_members]);
        
    }

    public function getExaminers()
    {
         // Retrieve project members from the database based on role
        $examiners = User::where('role', 'examiner')->get();
        
        // Pass the project members data to the view
        return view('examiners', ['examiners' => $examiners]);
        
    }

    public function getSupervisors()
    {
         // Retrieve project members from the database based on role
        $supervisors = User::where('role', 'supervisor')->get();
        
        // Pass the project members data to the view
        return view('supervisors', ['supervisors' => $supervisors]);
        
    }

    public function getStudents()
    {
         // Retrieve project members from the database based on role
        $students = User::where('role', 'student')->get();
        
        // Pass the project members data to the view
        return view('students', ['students' => $students]);
        
    }
    public function index()
    {
    $users = User::all();
    return view('users', ['users' => $users]); 
}

}


