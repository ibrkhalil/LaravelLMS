@extends('back.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('course.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">course Name:</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" />
                </div>
                <div class="form-group">
                    <label for="">category:</label>
                    <select name="category">
                        @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach;
                    </select>
                </div>
                <div class="form-group">
                    <label for="">instructor:</label>
                    <select name="instructor">
                        @foreach($inst as $i)
                        <option value="{{$i->id}}">{{$i->name}}</option>
                        @endforeach;
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add course</button>
                <a href="{{ route('course.index')}}" class="btn btn-primary">Back to Course List</a>
            </form>
        </div>
    </div>

</div>

@endsection