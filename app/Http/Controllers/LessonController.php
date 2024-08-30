<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $lesson = $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'audio' => 'required|mimes:mp3,mp4,mkv',
            'video' => 'required',
        ]);

        DB::beginTransaction();
        $audio_dir = $request->file('audio')->store('audio', 'public');
        $slug = Str::slug($lesson['title'], '-');

        $lesson = Lesson::create([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => $slug,
            'audio' => $audio_dir,
            'video' => $request->input('video'),
        ]);

        DB::commit();
        return redirect()->back();
        DB::rollBack();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = auth()->user();
        $lesson = Lesson::findOrFail($id);

        $valid = $request->validate([
            'course_id' => 'nullable',
            'title' => 'nullable',
            'content' => 'nullable',
            'audio' => 'nullable',
            'video' => 'nullable',
        ]);

        $lesson->title = $request->title ?? $lesson->title;
        $lesson->content = $request->content ?? $lesson->content;
        $lesson->video = $request->video ?? $lesson->video;
        if ($request->hasFile('audio')) {
            $audio_dir = $request->file('audio')->store('audio', 'public');
        } else {
            $audio_dir = $lesson->audio;
        }
        $slug = Str::slug($request->title ?? $lesson->title, '-');
        $lesson->audio = $audio_dir;
        $lesson->slug = $slug;
        // dd($lesson);
        $lesson->save();

        return redirect()->intended(route('dashboard.admin.course.lesson.show', $lesson->course->slug))->withInput($request->input())->with('message', 'Sermon Updated');
    
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson, $id)
    {
        //
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->back()->with('message', 'Course deleted Successfully');
    }
}
