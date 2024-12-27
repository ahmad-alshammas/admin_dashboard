<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
class CourseControllerUserSide extends Controller
{
    public function index()
    {
        $courses = Course::with(['instructor', 'category'])->get();
        $categories = CourseCategory::all(); // جلب جميع الفئات من قاعدة البيانات
    
        return view('user_side.courses.course', compact('courses', 'categories'));
    }
}
