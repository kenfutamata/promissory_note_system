<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\Assessment;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function verifyAssessment(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'assessment_id' => 'required|exists:assessments,assessment_id',  // Ensure the assessment_id exists in the assessments table
                'assessment_type' => 'required|string',
                'action' => 'required|in:approved,rejected',
            ]);

            $assessment = Assessment::where('assessment_id', $validatedData['assessment_id'])
                                    ->where('assessment_type', $validatedData['assessment_type'])
                                    ->first();

            if (!$assessment) {
                return redirect()->back()->with('status', 'Assessment not found!')->with('status_class', 'text-red-500');
            }

            $status = $validatedData['action'];
            $message = $status === 'approved' 
                ? 'Assessment successfully approved!' 
                : 'Assessment has been rejected.';

            $approval = Approval::updateOrCreate(
                [
                    'assessment_id' => $assessment->assessment_id,  
                    'assessment_type' => $assessment->assessment_type,  
                ],
                [
                    'status' => $status,  
                    'date_approved' => $status === 'approved' ? now() : null,  
                ]
            );

            $statusType = $status === 'approved' ? 'success' : 'error';

            return redirect()->route('accounting.verifyAssessment')->with('status', $message)->with('status_type', $statusType);
        }
        $assessments = Assessment::leftJoin('approvals', function ($join) {
            $join->on('assessments.assessment_id', '=', 'approvals.assessment_id')
                ->on('assessments.assessment_type', '=', 'approvals.assessment_type');
        })
        ->select('assessments.*', 'approvals.status', 'approvals.date_approved')
        ->get();
        
        return view('accounting.verifyAssessment', compact('assessments'));
    }
}