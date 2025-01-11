<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterStudent extends Controller
{
    public function registerStudent()
    {
        return view('/admin.registerStudent');  
    }

    public function storeStudentRegister(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string|max:8|unique:users,user_id',
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

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $validatedData = $request->validate([
            'profile_picture' => 'nullable|max:2048',
        ]);
            
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        User::create([
            'user_id' => $validatedData['user_id'],
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'] ?? null, 
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'program' => $validatedData['program'],
            'year_section' => $validatedData['year_section'],
            'department' => $validatedData['department'],
            'password' => Hash::make($validatedData['password']),
            'profile_picture' => $profilePicturePath ?? null,
        ]);

        return redirect()->back()->with('status', 'Student registered successfully!');
    }

}