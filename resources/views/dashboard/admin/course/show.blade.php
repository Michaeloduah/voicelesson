@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h3 class=""><strong>Course Name: {{ $course->name }}</strong></h3>
                <p>{{ $course->description }}</p>

            </div>
            <div class="m-4 ">
                <a href="{{ route('dashboard.admin.course.lesson.addlesson', $course->slug) }}"><button
                        class="btn btn-outline-success btn-sm"><i class="bi bi-plus"></i> Add New Lesson</button></a>
            </div>
        </div>
        <h3 class=""><strong>Lessons:</strong></h3>
        @foreach ($lessons as $lesson)
            <div class="accordion accordion-flush my-2" id="accordionFlushExample">
                <div class="accordion-item px-3 rounded">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-dark" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ $lesson->id }}" aria-expanded="false" aria-controls="{{ $lesson->id }}">
                            Lesson 1: {{ $lesson->title }}
                        </button>
                    </h2>
                    <div id="{{ $lesson->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        Lesson Overview
                                    </div>
                                    <div>
                                        {{ $lesson->content }}
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        Audio
                                    </div>
                                    <div>
                                        {{ $lesson->audio }}
                                        <audio src=""></audio>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('dashboard.admin.course.lesson.editlesson', $lesson->slug) }}"><button
                                            class="btn btn-sm btn-outline-info m-1"><i class="bi bi-pencil-square"></i>Edit
                                            Lesson</button></a>
                                    <a href="{{ route('dashboard.admin.course.deletelesson', $lesson->id) }}"><button
                                            class="btn btn-sm btn-outline-danger m-1"><i
                                                class="bi bi-trash"></i>Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
