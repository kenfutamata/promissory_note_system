<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\PromissoryNote;
use Illuminate\Http\Request;

class PromissoryController extends Controller
{
    public function promissory()
    {
        $promissoryNotes = PromissoryNote::where('user_id', Auth::user()->user_id)->get();
        
        return view('user.promissory', compact('promissoryNotes'));
    }

    public function storePromissoryNote(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string|max:8', 
            'name' => 'required|string|max:255',
            'year_section' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'amount_due_for' => 'required|in:prelim,midterm,semifinal,finals',
            'partial_payment' => 'nullable|numeric|min:0',
            'balance_due' => 'required|numeric|min:1',
            'reason' => 'required|string|min:10',
            'payment_schedule' => 'required|date|after_or_equal:today',
        ]);

        PromissoryNote::create($validatedData);

        return redirect()->back()->with('success', 'Promissory note submitted successfully!');
    }
}
