<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use PDF;

class MarksController extends Controller
{
    public function create()
{
    $validDocumentTypesSemester1 = [
        'Proposal',
        'Progress 1',
        'Status document 1',
        'Proposal document',
    ];

    $validDocumentTypesSemester2 = [
        'Progress 2',
        'Final',
        'Topic assessment form',
        'Project charter',
        'Logbook',
        'Status document 2',
        'Final thesis',
        'Website', // Assuming this is a valid document type for semester 2
    ];

    return view('Marks.marksform', compact('validDocumentTypesSemester1', 'validDocumentTypesSemester2'));
}


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'semester' => 'required|in:semester1,semester2',
            'document_type' => 'required|string',
            'group_id' => 'required|string',
            'student1_it_no' => 'required|string',
            'student1_grade' => 'required|string',
            'student2_it_no' => 'required|string',
            'student2_grade' => 'required|string',
            'student3_it_no' => 'required|string',
            'student3_grade' => 'required|string',
            'student4_it_no' => 'required|string',
            'student4_grade' => 'required|string',
        ]);

        // Determine which semester's document types were selected
        $validDocumentTypes = [];
        if ($request->semester === 'semester1') {
            $validDocumentTypes = [
                'Proposal',
                'Progress 1',
                'Status document 1',
                'Proposal document',
            ];
        } elseif ($request->semester === 'semester2') {
            $validDocumentTypes = [
                'Progress 2',
                'Final',
                'Topic assessment form',
                'Project charter',
                'Logbook',
                'Status document 2',
                'Final thesis',
                'Website', // Assuming this is a valid document type for semester 2
            ];
        }

        // Validate the selected document type against the valid document types for the chosen semester
        if (!in_array($request->document_type, $validDocumentTypes)) {
            return redirect()->back()->with('error', 'Invalid document type for the selected semester.');
        }

        // Create a new record in the database using the Mark model
        $mark = new Mark();
        $mark->date = $request->date;
        $mark->semester = $request->semester;
        $mark->document_type = $request->document_type;
        $mark->group_id = $request->group_id;
        $mark->student1_it_no = $request->student1_it_no;
        $mark->student1_grade = $request->student1_grade;
        $mark->student2_it_no = $request->student2_it_no;
        $mark->student2_grade = $request->student2_grade;
        $mark->student3_it_no = $request->student3_it_no;
        $mark->student3_grade = $request->student3_grade;
        $mark->student4_it_no = $request->student4_it_no;
        $mark->student4_grade = $request->student4_grade;
        $mark->save();

        return redirect()->route('Marks.marksform')->with('success', 'Marks entered successfully!');
    }

    public function viewBySemester(Request $request)
{
    $semester = $request->input('semester');

    if ($semester === 'semester1') {
        $marks = Mark::where('semester', 'semester1')->get();
        return view('Marks.sem1', compact('marks'));
    } elseif ($semester === 'semester2') {
        $marks = Mark::where('semester', 'semester2')->get();
        return view('Marks.sem2', compact('marks'));
    } else {
        // Handle invalid semester selection
        return redirect()->route('Marks.marksform')->with('error', 'Invalid semester selection');
    }
}
    public function viewSemester1()
    {
        $marks = Mark::where('semester', 'semester1')->get();
        return view('Marks.sem1', compact('marks'));
    }

    public function viewSemester2()
    {
        $marks = Mark::where('semester', 'semester2')->get();
        return view('Marks.sem2', compact('marks'));
    }

    public function generateReportFromView(Request $request)
    {
        $marks = Mark::where('semester', 'semester1')->get();

        // Create a Dompdf instance
        $dompdf = new Dompdf();
        
        // Load the view file
        $html = View::make('Marks.mark_sheet_pdf', compact('marks'))->render();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (optional)
        $dompdf->render();

        // Stream the PDF directly to the browser
        return $dompdf->stream('semester1_mark_sheet.pdf');
    }
}
