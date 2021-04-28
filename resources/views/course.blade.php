@extends('back.layout')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper container">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Course Name</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->name}}</td>
                <td><a href="{{ route('course.edit', $course->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('course.destroy', $course->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('course.create')}}" class="btn btn-primary">Create Course</a>
    <div>

        @endsection