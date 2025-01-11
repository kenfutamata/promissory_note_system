<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use Illuminate\Support\Facades\Auth;


class AssessmentController extends Controller
{
    public function assessment(Request $request)
    {
        if ($request->isMethod('get')) {
            $assessments = Assessment::where('user_id', Auth::user()->user_id)->get();

            return view('user.assessment', compact('assessments'));
        }

        $validatedData = $request->validate([
            'assessment_type' => 'required|string|max:255',
            'assessment_file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'receipt_file' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
            'uploaded_date' => 'required|date_format:Y-m-d',
        ]);

        $assessmentFilePath = $request->file('assessment_file')->store('assessments', 'public');
        $receiptFilePath = $request->file('receipt_file') ? $request->file('receipt_file')->store('receipts', 'public') : null;

        Assessment::create([
            'user_id' => Auth::user()->user_id,
            'assessment_path' => $assessmentFilePath,
            'receipt_path' => $receiptFilePath,
            'assessment_type' => $validatedData['assessment_type'],
            'uploaded_date' => $validatedData['uploaded_date'],
        ]);

        return redirect()->route('user.assessment')->with('status', 'Assessment uploaded successfully!');
    }
}