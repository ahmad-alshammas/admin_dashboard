<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseControllerUserSide;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CourseDetailUserSide;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('admin.home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth' , 'role:admin'])->group(function(){

    Route::get('/admin/dashboard', [Controller::class, 'dashboard'])->name('admin.dashboard');


    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');

    //---------------------------------------------------------------------------------------------
    // courses :

    Route::get('admin/courses',[CourseController::class,'index'])->name('courses.index');
    Route::get('/courses/{course}/edit',[CourseController::class,'edit'])->name('courses.edit');
    Route::put('/courses/{course}',[CourseController::class,'update'])->name('courses.update');
    Route::get('/courses/create', [CourseController::class,'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class,'store'])->name('courses.store');
    Route::delete('/courses/{course}',[CourseController::class,'destroy'])->name('courses.destroy');

    //---------------------------------------------------------------------------------------------
    // category courses:
    Route::get('/categories',[CourseCategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/{category}/edit',[CourseCategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{category}',[CourseCategoryController::class,'update'])->name('categories.update');
    Route::get('/categories/create', [CourseCategoryController::class,'create'])->name('categories.create');
    Route::post('/categories', [CourseCategoryController::class,'store'])->name('categories.store');
    Route::delete('/categories/{category}',[CourseCategoryController::class,'destroy'])->name('categories.destroy');

    //---------------------------------------------------------------------------------------------
    // Sections routes
    Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
    Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
    Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
    Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

    //---------------------------------------------------------------------------------------------
    // lessons courses:
    Route::get('/lessons',[LessonController::class,'index'])->name('lessons.index');
    Route::get('/lessons/{lesson}/edit',[LessonController::class,'edit'])->name('lessons.edit');
    Route::put('/lessons/{lesson}',[LessonController::class,'update'])->name('lessons.update'); 
    Route::get('/lessons/create', [LessonController::class,'create'])->name('lessons.create');
    Route::post('/lessons', [LessonController::class,'store'])->name('lessons.store');
    Route::delete('/lessons/{section}',[LessonController::class,'destroy'])->name('lessons.destroy');

    //---------------------------------------------------------------------------------------------
    // Enrollment:
    Route::get('/enrollments',[EnrollmentController::class,'index'])->name('enrollments.index');
    Route::get('/enrollments/{enrollment}/edit',[EnrollmentController::class,'edit'])->name('enrollments.edit');
    Route::put('/enrollments/{enrollment}',[EnrollmentController::class,'update'])->name('enrollments.update');
    Route::get('/enrollments/create', [EnrollmentController::class,'create'])->name('enrollments.create');
    Route::post('/enrollments', [EnrollmentController::class,'store'])->name('enrollments.store');
    Route::delete('/enrollments/{section}',[EnrollmentController::class,'destroy'])->name('enrollments.destroy');
    
});

//---------------------------------------------------------------------------------------------

// User Side : 


Route::get('/home' , function(){
    return view('user_Side.home.home');
});

// Route::get('/courses' , function(){
//     return view('user_side.courses.course');
// });

Route::get('/courses' , [CourseControllerUserSide::class,'index']) -> name('user.courses.index');


Route::get('/aboutus' , function(){
    return view('user_side.aboutUs.aboutUs');
});


Route::get('/contact' , function(){
    return view('user_side.contact.contact');
});


Route::get('/coursedetail' , function() {
    return view('user_side.coursesDetail.course_detail');
});


Route::get('/course_detail/{courseId}', [CourseDetailUserSide::class, 'show'])->name('course_detail');
