<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Section;

class CourseDetailUserSide extends Controller
{
    /**
     * Display the course details along with sections and lessons.
     */
    public function show($courseId)
    {
        // استرجاع الـ Course بناءً على الـ ID
        $course = Course::with('sections.lessons')->findOrFail($courseId);

        // تمرير البيانات إلى الـ view
        return view('user_side.coursesDetail.course_detail', compact('course'));
    }
}

