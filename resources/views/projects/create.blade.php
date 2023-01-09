@extends('layouts.layout')
@section('content')
    <h2>Create Project</h2>
    <form method="POST" action="{{ route("projects.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter title">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection