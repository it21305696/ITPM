<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spreadsheet;
use Illuminate\Support\Facades\Storage;

class SpreadsheetController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'file' => 'required|mimes:xls,xlsx|max:2048', // Validate file types and size
    ]);

    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();

    // Store file in 'public/uploads' directory
    $filePath = $file->storeAs('uploads', $fileName, 'public');

    $spreadsheet = new Spreadsheet();
    $spreadsheet->name = $request->name;
    $spreadsheet->file_path = $filePath;
    $spreadsheet->document_type = $request->document_type;
    $spreadsheet->docname = $request->docname;
    $spreadsheet->semester = $request->semester;
    $spreadsheet->save();

    return redirect()->route('list')->with('success', 'Excel sheet uploaded successfully!');
}

    public function download($id)
{
    $spreadsheet = Spreadsheet::findOrFail($id);

    $filePath = Storage::disk('public')->path($spreadsheet->file_path);

    if (!Storage::disk('public')->exists($spreadsheet->file_path)) {
        abort(404, 'File not found');
    }

    // Determine the filename with the correct extension
    $filename = $spreadsheet->name . '.xlsx'; // Assuming it's always an Excel file

    // Set the Content-Disposition header
    $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    // Return the file as a response
    return response()->file($filePath, $headers);
}

public function listFiles(Request $request)
{
    $semester = $request->input('semester');

    $spreadsheets = Spreadsheet::when($semester, function ($query) use ($semester) {
        return $query->where('semester', $semester);
    })->get();

    if ($semester === 'semester1') {
        return view('semester1', compact('spreadsheets'));
    } elseif ($semester === 'semester2') {
        return view('semester2', compact('spreadsheets'));
    } else {
        // Default view if no specific semester is selected
        return view('list', compact('spreadsheets'));
    }
}

}
