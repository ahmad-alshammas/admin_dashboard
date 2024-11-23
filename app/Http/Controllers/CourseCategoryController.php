<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoires = CourseCategory::all();
        return view('admin.categories.index',compact('categoires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CourseCategory::create($request->all());

        return redirect()->route('categories.index')->with('successAdd', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $category)
    {
      //  $category = CourseCategory::findOrFail($category_id);
        return view('admin.categories.edit' , ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($category_id)
    {
        $name = request()->name;
        $description = request()->description;
        $find_category = CourseCategory::findOrFail($category_id);
        $find_category -> update([
            'name' => $name,
            'description' => $description,
        ]);

        return redirect()->route('categories.index',$category_id)->with('successUpdate', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $category)
    {
        $category -> delete();
        return redirect()->route('categories.index')->with('successDelete', 'Category deleted successfully!');

    }
}
