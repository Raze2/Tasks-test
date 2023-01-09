@extends('layouts.layout')
@section('content')
    <h2>Projects</h2>
    <div class="row">
        @foreach($projects as $project)
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title">{{$project->name}}</h5>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onclick="confirm('Are You Sure?')" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
        @if($projects->count() == 0)
            <div class="card col-12">
                <div class="card-body">
                    <h5 class="card-title">No Projects</h5>
                </div>
            </div>
        @endif
    </div>
@endsection