@extends('layouts.app')

@section('title', 'Add Course')

@section('content')
<div class="container">
    <h1>Add New Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        @include('courses._form')

        <button type="submit" class="btn btn-primary">Save Course</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
