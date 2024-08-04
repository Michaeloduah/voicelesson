<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseController extends Controller
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
        $course = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'audio' => 'required|mimes:mp3,mp4,ogg,wav,aac,flac',
            'content' => 'nullable',
        ]);

        $audio_dir = $request->file('audio')->store('audio', 'public');

        DB::beginTransaction();

        $course = Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'audio' => $audio_dir,
            'content' => $request->input('content'),
        ]);

        DB::commit();
        return redirect()->back();
        DB::rollBack();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
