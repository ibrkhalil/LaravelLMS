@extends('back.layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Course Name
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('course.update', $course->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Course Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $course->name }}" />
            </div>
            <!-- <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Course ID:</label>
                <select>
                    @foreach($Courses as $CoursesId)
                    <option @if($course->instructor_id == $CoursesId->id) selected='$i->id' @endif>
                        {{($CoursesId->id)}}
                    </option>
                    @endforeach
                </select>
            </div> -->
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Instructor:</label>
                <select name="instructor_name">
                    @foreach($instructors as $i)
                    <option @if($course->instructor_id == $i->id) selected='$i->id' @endif>
                        {{$i->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</div>
@endsection