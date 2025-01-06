<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Section;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::with('section.course')->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('admin.lessons.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'content_file' => 'required|file|mimes:mp4,mov,avi|max:102400', // الحد الأقصى 100 ميجابايت
            'order' => 'required|integer',
        ]);
    
        // تخزين الفيديو
        $filePath = $request->file('content_file')->store('videos', 'public');
    
        // إنشاء الدرس
        Lesson::create([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'content_url' => $filePath, // حفظ مسار الفيديو
            'order' => $request->order,
        ]);
    
        return redirect()->route('lessons.index')->with('successAdd', 'Lesson added successfully!');
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
    public function edit(Lesson $lesson)
    {
        $sections = Section::all();
        return view('admin.lessons.edit', compact('lesson', 'sections'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update([
            'section_id' => $request->section_id,
            'title' => $request->title,
            'order' => $request->order,
        ]);

        return redirect()->route('lessons.index')->with('successUpdate', 'Lesson updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')->with('successDelete', 'Lesson deleted successfully!');
    }
}
