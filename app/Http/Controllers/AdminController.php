<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class AdminController extends Controller
{
    public function index()
    {
        $notices = Notice::all();
        return view('admin_home', compact('notices'));
    }

    public function create()
    {
        return view('create_notice');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        // Remove _token from the request data
        $data = $request->except('_token');

        // Create a new notice
        Notice::create($data);

        // Redirect back to admin home page with success message
        return redirect()->route('admin_home')->with('success', 'Notice created successfully!');
    }

    public function edit(Notice $notice)
    {
        return view('edit_notice', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        // Remove _token from the request data
        $data = $request->except('_token');

        // Update the notice
        $notice->update($data);

        // Redirect back to admin home page with success message
        return redirect()->route('admin_home')->with('success', 'Notice updated successfully!');
    }

    public function destroy(Notice $notice)
    {
        // Delete the notice
        $notice->delete();

        // Redirect back to admin home page with success message
        return redirect()->route('admin_home')->with('success', 'Notice deleted successfully!');
    }
}

