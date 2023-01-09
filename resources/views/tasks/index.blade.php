@extends('layouts.layout')
@section('content')
    <form action="{{route('tasks.index')}}" method="GET">
        <label for="project_id">Select Project</label>
        <div class="row">
            <select class="form-control col-9" id="project_id" name="project_id">
                <option value="">All</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary col-3">Submit</button>
        </div>
    </form>

    <h2 class="pt-2">Tasks</h2>
    <div class="row sort-menu">
        @foreach($tasks as $task)
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title">{{$task->name}}</h5>
                    <p class="card-text">Project: {{$task->project->name}}</p>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onclick="confirm('Are You Sure?')" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        @if($tasks->count() == 0)
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title">No Tasks</h5>
                </div>
            </div>
        @endif
    </div>
    
@endsection