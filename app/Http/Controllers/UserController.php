<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;



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


    public function addUser(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:project_member,examiner,supervisor,student',
    ]);

    // Create and save the new user
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']); // Hash the password
    $user->role = $validatedData['role'];
    $user->save();

    // Redirect back with a success message or handle the response as needed
    return redirect()->route('users')->with('success', 'User added successfully!');
    }

    public function destroy(User $user)
    {
        // Delete user
        $user->delete();

        // Redirect back to admin home page with success message
        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }

    public function generateReport()
    {
        // Retrieve all users
        $users = User::all();

        // Load the "report" view with users data
        $pdf = $this->createPDFView('report', compact('users'));

        // Generate PDF file
        $pdf->stream('users_report.pdf');
    }

    private function createPDFView($view, $data)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $html = View::make($view, $data)->render();
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important for PDF generation to work)
        $dompdf->render();

        return $dompdf;
    }
 
}


