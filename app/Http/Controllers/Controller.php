<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function dashboard()
    {
        // 1. عدد المستخدمين
        $usersCount = DB::table('users')->count();

        // 2. عدد الكورسات حسب التصنيف
        $coursesByCategory = DB::table('courses')
            ->join('course_categories', 'courses.category_id', '=', 'course_categories.category_id')
            ->select(DB::raw('course_categories.name as category_name, COUNT(courses.id) as total_courses'))
            ->groupBy('course_categories.name')
            ->pluck('total_courses', 'category_name');

        // 3. عدد المسجلين في كل كورس
        $enrollmentsByCourse = DB::table('enrollments')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select(DB::raw('courses.title as course_title, COUNT(enrollments.id) as total_enrollments'))
            ->groupBy('courses.title')
            ->pluck('total_enrollments', 'course_title');

        // تمرير البيانات إلى واجهة المستخدم
        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'coursesByCategory' => $coursesByCategory,
            'enrollmentsByCourse' => $enrollmentsByCourse,
        ]);
    }
}
