<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseCategory;

use App\Http\Controllers\validate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $courses = Course::with(['instructor', 'category'])->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = User::where('role', 'instructor')->get();
        $categories = CourseCategory::all();


         return view('admin.courses.create',compact('instructors' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required | max:255 | string',
            'description' => 'required | max:255 | string',
            'price' => 'required | numeric',
            'image' => 'required | mimes:png,jpg,jpeg',
            'instructor_id' => 'required|exists:users,id'
        ]);

        if($request -> has('image')){
            $file = $request->file('image');
            $extension = $file -> getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/course/';
            $file -> move($path,$filename);
        }

        Course::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'price' => $request -> price,
            'image' => $path.$filename,
            'instructor_id' => $request->instructor_id,
            'category_id' => $request->category_id,
        ]);

            return redirect()->route('courses.index')->with('successAdd','Course Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit',['course'=>$course]);
    }



    /**
     * Update the specified resource in storage.
     */

     public function update($id){
        $title = request()->title;
        $description = request()->description;
        $price = request()->price;
        $find_course = Course::findOrFail($id);

        $find_course -> update([
            'title' => $title,
            'description' => $description,
            'price' => $price,
        ]);

        // return to_route('courses.index',$id);
        return redirect()->route('courses.index',$id)->with('successUpdate', 'Course updated successfully!');

     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('successDelete', 'Course deleted successfully!');


    }
}
