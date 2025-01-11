<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PromissoryNote;
use App\Models\Assessment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function contactInfo()
    {
        return view('contactInfo'); 
    }

    public function forgotPass()
    {
        return view('forgotPass'); 
    }

    public function dashboard()
    {
        $user = Auth::user(); 
        $assessmentsSubmitted = Assessment::where('user_id', $user->id)->count();
        $promissoryNotesCount = PromissoryNote::where('user_id', $user->id)->count();

        return view('user.dashboard', compact('assessmentsSubmitted', 'promissoryNotesCount'));
    }

    public function notifications()
    {
        $user = Auth::user(); 
        return view('user.notifications', compact('user'));
    }

    public function history()
    {
        $user = Auth::user();
    
        $promissoryNotes = PromissoryNote::with('cads')  
            ->where('user_id', $user->id)  
            ->get();
        
        return view('user.history', compact('user', 'promissoryNotes'));
    }

    public function settings()
    {
        $user = Auth::user(); 
        return view('user.settings', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user(); 
        return view('user.profile', compact('user'));
    }

    public function viewStudents() {
        $students = User::all(); 
        $students = User::where('role', 'student')->get(); 
        return view('admin.viewStudents', compact('students'));
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',  
            'middle_name' => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|string|email|max:255|unique:users,email',
            'program' => 'required|string|max:255',
            'year_section' => 'required|string',
            'department' => 'required|string|max:100',
            'password' => 'required|min:8',
            'profile_picture' => 'nullable|max:2048',
        ]);

    }

    public function delete(){

    }
}
