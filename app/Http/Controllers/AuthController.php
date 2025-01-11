<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login'); 
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'id_or_email' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->id_or_email)
                    ->orWhere('user_id', $request->id_or_email)
                    ->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return $this->redirectToDashboard($user);
        }
    
        return back()->withErrors(['id_or_email' => 'Invalid email or ID number or password.']);
    }

    public function logout()
    {
        auth::guard('user')->logout();
        return redirect()->route('login'); 
    }
    
    private function redirectToDashboard(User $user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.registerStudent');
            case 'accounting':
                return redirect()->route('accounting.verifyAssessment');
            case 'cads':
                return redirect()->route('cads.verifyPromissory');
            case 'student':
            default:
                return redirect()->route('user.dashboard');
        }
    }
}
