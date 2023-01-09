@extends('layouts.layout')
@section('content')
    <h2>Tasks</h2>
    <div class="row sort-menu">
        @foreach($tasks as $task)
            <div class="card col-12 handle" data-id="{{$task->id}}">
                <div class="card-body handle">
                    <h5 class="card-title">{{$task->name}}</h5>
                    <p class="card-text">Project: {{$task->project->name}}</p>
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

@section('script')
    <script>
        $(document).ready(function(){
    
            function updateToDatabase(idString){
               $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
                
               $.ajax({
                  url:'{{route('tasks.sort')}}',
                  method:'POST',
                  data:{ids:idString},
               })
            }
    
            var target = $('.sort-menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function (e, ui){
                   var sortData = target.sortable('toArray',{ attribute: 'data-id'})
                   updateToDatabase(sortData.join(','))
                }
            })
            
        })
    </script>  
@endsection