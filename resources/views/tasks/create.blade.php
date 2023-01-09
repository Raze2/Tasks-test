@extends('layouts.layout')
@section('content')
    <h2>Create Task</h2>
    <form method="POST" action="{{ route("tasks.store") }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name"></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="project_id">Project</label>
            <select class="form-control" id="project_id" name="project_id">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection