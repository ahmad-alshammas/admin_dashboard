<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class CourseControllerUserSide extends Controller
{
    public function index()
    {   

        $courses = Course::with(['instructor', 'category'])->get();

        return view('user_side.courses.course', compact('courses'));
    }
}
