<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PromissoryNote;
use App\Models\Assessment;
use App\Models\Cads; 
use Illuminate\Support\Facades\Mail;
use App\Mail\PromissoryNoteStatus;
use Exception;
use Illuminate\Support\Facades\Log;

class CadsController extends Controller
{
    const APPROVED = 'approved';
    const REJECTED = 'rejected';

    public function fetchPromissoryAndAssessment(Request $request)
    {
        if ($request->isMethod('get')) {
            $promissoryNotes = PromissoryNote::select(
                'note_id', 'name', 'year_section', 'contact_no', 
                'amount_due_for', 'partial_payment', 'balance_due', 
                'reason', 'payment_schedule'
            )->get();

            $assessments = Assessment::select('assessment_path', 'receipt_path')->get();
            $cads = Cads::all();

            return view('cads.verifyPromissory', compact('promissoryNotes', 'assessments', 'cads'));
        }

        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'note_id' => 'required|exists:promissorynotes,note_id',
                'action' => 'required|in:' . self::APPROVED . ',' . self::REJECTED,
            ]);

            $note = PromissoryNote::findOrFail($validatedData['note_id']);

            $cads = Cads::firstOrNew(['note_id' => $note->note_id]);
            $cads->status = $validatedData['action'];
            $cads->date_approved = now();
            $cads->save();

            $this->sendNotificationEmail($note, $validatedData['action']);

            $statusMessage = $validatedData['action'] === self::APPROVED
                ? 'The promissory note has been approved successfully.'
                : 'The promissory note has been rejected.';

            return redirect()->back()->with([
                'status' => $statusMessage,
                'status_type' => $validatedData['action'] === self::APPROVED ? 'success' : 'error',
            ]);
        }

        return redirect()->back()->with('error', 'Invalid request method.');
    }

    private function sendNotificationEmail(PromissoryNote $note, string $action)
    {
        $studentID = $note->user_id ?? null;
        if (!$studentID) {
            return; 
        }

        $user = User::where('user_id', $studentID)->first();

        $studentEmail = $user->email ?? null;
        if (!$studentEmail) {
            return; 
        }

        $actionStatus = ucfirst($action);
        $subject = "Promissory Note " . $actionStatus;
        $messageBody = "Dear " . $note->name . ",\n\n"
            . "Your promissory note regarding " . $note->amount_due_for . " has been " . strtolower($actionStatus) . ".\n"
            . "Details:\n"
            . "- Balance Due: " . $note->balance_due . "\n"
            . "- Payment Schedule: " . $note->payment_schedule . "\n\n"
            . "If you have any questions, please contact the CADS office.\n\n"
            . "Best regards,\nCADS Office";

        try{
            Mail::to($studentEmail)->send(new PromissoryNoteStatus($note, $subject, $messageBody));
        }
        catch(Exception $e){
            return redirect()->back()->with('error', 'Failed to send email.', $e->getMessage());

        }
    }
}