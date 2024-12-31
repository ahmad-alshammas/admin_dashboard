<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Course;

class FavoriteController extends Controller
{
    // استرجاع الكورسات المفضلة للمستخدم
    public function index()
{
    $user = auth()->user();
    $favoriteCourses = $user->favoriteCourses()->with('category', 'instructor')->get(); // جلب العلاقات
    $categories = $favoriteCourses->pluck('category')->unique()->filter(); // استخراج التصنيفات المميزة
    
    return view('user_side.favorites.favorites', compact('favoriteCourses', 'categories'));
}


    

    // إضافة كورس إلى المفضلة
// إضافة كورس إلى المفضلة
public function addToFavorites(Request $request, $courseId)
{
    $user = auth()->user(); // الحصول على المستخدم المتصل
    $course = Course::findOrFail($courseId); // البحث عن الكورس بناءً على الـ ID

    // إضافة الكورس إلى المفضلة (ربط المستخدم بالكورس)
    $user->favoriteCourses()->attach($course); // إضافة الكورس للمفضلة

    return response()->json(['success' => true]); // إرجاع استجابة بأن العملية نجحت
}



    // عرض الكورسات المفضلة للمستخدم
    public function showFavorites()
    {
        $user = auth()-> user();
        $favoriteCourses = $user->favoriteCourses;  // استرجاع الكورسات المفضلة للمستخدم

        return view('user_side.favorites.favorites', compact('favoriteCourses'));
    }

    // حذف كورس من المفضلة
    public function removeFromFavorites(Request $request)
    {
        $user = auth()->user();
        $courseId = $request->input('course_id');

        $favorite = Favorite::where('user_id', $user->id)
                            ->where('course_id', $courseId)
                            ->first();

        if ($favorite) {
            $favorite->delete();  // حذف الكورس من المفضلة
            return response()->json(['message' => 'Course removed from favorites'], 200);
        }

        return response()->json(['message' => 'Course not found in favorites'], 404);
    }
}
