@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<h1>Courses</h1>
<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th><th>Fee</th><th>Difficulty</th><th>Active</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>{{ $course->fee }}</td>
            <td>{{ $course->difficulty }}</td>
            <td>{{ $course->is_active ? 'Yes' : 'No' }}</td>
            <td>
                <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this course?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $courses->links() }}
@endsection
