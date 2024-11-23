<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with('user', 'course')->get();
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $users = User::where('role', 'student')->get();
        $courses = Course::all();
        return view('admin.enrollments.create', compact('users', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'enrolled_at' => now(),
        ]);

        return redirect()->route('enrollments.index')->with('successAdd', 'Enrollment created successfully!');
    }

    public function edit(Enrollment $enrollment)
    {
        $users = User::where('role', 'student')->get();
        $courses = Course::all();
        return view('admin.enrollments.edit', compact('enrollment', 'users', 'courses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $enrollment->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('enrollments.index')->with('successUpdate', 'Enrollment updated successfully!');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('successDelete', 'Enrollment deleted successfully!');
    }
}
