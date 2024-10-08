@extends('layouts.dashboard')

@section('content')
    <h3>Edit Course</h3>
    <form method="POST" action="{{ route('dashboard.admin.course.update', $course->id) }}" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Course Name:</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        @if ($errors->has('name'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
            </span>
        @endif

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="3" ></textarea>
        </div>
        @if ($errors->has('description'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('description') }}</span>
            </span>
        @endif

        {{-- <div class="mb-3">
            <label for="audio" class="form-label">Audio File(s):</label>
            <input type="file" name="audio" class="form-control" id="audio">
        </div>
        @if ($errors->has('audio'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('audio') }}</span>
            </span>
        @endif

        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <input type="text" name="content" class="form-control" id="content">
        </div>
        @if ($errors->has('content'))
            <span class="error text-danger">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('content') }}</span>
            </span>
        @endif --}}

        <button class="btn btn-sm btn-outline-info mt-3" type="submit">Update Course</button>

    </form>
@endsection
