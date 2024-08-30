@extends('layouts.dashboard')

@section('content')
    <h3 class="mt-5"><strong>Course Name: {{ $lesson->course->name }}</strong></h3>
    <h5>Edit Lesson {{$lesson->slug}}</h5>

    <form method="POST" action="{{ route('dashboard.admin.course.lesson.updatelesson', $lesson->id) }}" enctype="multipart/form-data"
        id="myForm">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="hidden" name="course_id" class="form-control" id="course_id" value="{{ $lesson->course->id }}">
            <input type="text" name="title" class="form-control" id="title" value={{ old('title') }}>
        </div>
        @if ($errors->has('title'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('title') }}</span>
            </span>
        @endif

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea class="form-control" name="content" id="content" rows="3" value={{ old('content') }}></textarea>
        </div>
        @if ($errors->has('content'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('content') }}</span>
            </span>
        @endif

        <div class="mb-3">
            <label for="audio" class="form-label">Audio File(s):</label>
            <input type="file" name="audio" class="form-control" id="audio">
        </div>
        @if ($errors->has('audio'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('audio') }}</span>
            </span>
        @endif

        <div class="mb-3">
            <label for="video" class="form-label">Video Link:</label>
            <input type="text" name="video" class="form-control" id="video" value={{ old('video') }}>
        </div>
        @if ($errors->has('video'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('video') }}</span>
            </span>
        @endif

        <button class="btn btn-sm btn-outline-info mt-3" type="submit">Create Course</button>

    </form>
@endsection
