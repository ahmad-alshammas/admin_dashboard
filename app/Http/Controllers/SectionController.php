<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Course;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::with('course')->get();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.sections.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Section::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'order' => $request->order,
            'total' => $request->total,
        ]);
    
        return redirect()->route('sections.index')->with('successAdd', 'Section added successfully!');
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
    public function edit(Section $section)
    {
        $courses = Course::all();
        return view('admin.sections.edit', compact('section', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $section->update([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'order' => $request->order,
            'total' => $request->total,
        ]);
    
        return redirect()->route('sections.index')->with('successUpdate', 'Section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('successDelete', 'Section deleted successfully!');
    
    }
}
