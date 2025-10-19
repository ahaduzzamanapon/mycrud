<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function courses()
    {
        return view('student.courses');
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function settings()
    {
        return view('student.settings');
    }

    public function update(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'about' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->address = $request->address;
        $student->date_of_birth = $request->date_of_birth;
        $student->about = $request->about;

        if ($request->password) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
    }
}