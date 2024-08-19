<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
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
        $user = auth()->user();
        $courses = Course::all();
        return view('dashboard.admin.course.index', compact('user', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->user();
        return view('dashboard.admin.course.create', compact('user'));
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
        ]);

        DB::beginTransaction();

        $slug = Str::slug($course['name'], '-');

        $course = Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => $slug,
        ]);

        DB::commit();
        return redirect()->intended(route('dashboard.admin.course.index', absolute: false));
        DB::rollBack();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, $slug)
    {
        //
        $user = auth()->user();
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('dashboard.admin.course.show', compact('user', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, $id)
    {
        //
        $user = auth()->user();
        $course = Course::findOrFail($id);
        return view('dashboard.admin.course.edit', compact('user', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $course = Course::findOrFail($id);
        $valid = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable',
        ]);

        $course->name = $request->name ?? $course->name;
        $course->description = $request->description ?? $course->description;
        $slug = Str::slug($request->name ?? $course->name, '-');
        $course->slug = $slug; 
        $course->save();

        return redirect()->intended(route('dashboard.admin.course.index'))->withInput($request->input())->with('message', 'Sermon Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, $id)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('message', 'Course deleted Successfully');
    }
}
