@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h3 class=""><strong>All courses</strong></h3>
        <div class="m-4 ">
            <a href=""><button class="btn btn-outline-info btn-sm"><i
                        class="bi bi-plus"></i> Add New Course</button></a>
        </div>

        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Date Created</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                    <tr style="background: none">
                        <td> {{ $course->created_at }} </td>
                        <td> {{ $course->name }} </td>
                        <td> {{ $course->description }} </td>
                        <td>
                            <a href="{{ route('dashboard.admin.course.lesson.show', $course->slug) }}"><button
                                    class="btn btn-sm btn-outline-success m-1"><i
                                        class="bi bi-book"></i> Lessons</button></a>
                            <a href="{{ route('dashboard.admin.course.edit', $course->id) }}"><button
                                    class="btn btn-sm btn-outline-info m-1"><i
                                        class="bi bi-pencil-square"></i>Edit</button></a>
                            <a href="{{ route('dashboard.admin.course.destroy', $course->id) }}"><button
                                    class="btn btn-sm btn-outline-danger m-1"><i 
                                        class="bi bi-trash"></i>Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
