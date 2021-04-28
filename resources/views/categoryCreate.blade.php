@extends('back.layout')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Add Category Name
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
        <form method="post" action="{{ route('category.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" name="name" />
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
            <a href="{{ route('category.index')}}" class="btn btn-primary">Back to Category List</a>
        </form>
    </div>
</div>
@endsection