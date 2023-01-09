<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\OrderTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\TaskFilterRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaskFilterRequest $request)
    {
        $tasks = Task::with('project')
            ->when($request->project_id, function($query, $value) {
                $query->where('project_id', $value);
            })
            ->orderBy('priority', 'ASC')->get();

        $projects = Project::Has('tasks')->get();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()->route('tasks.index');
    }

    /**
     * Order the specified resource.
     */
    public function sortView(){
        $tasks = Task::with('project')->orderBy('priority', 'ASC')->get();

        return view('tasks.sort', compact('tasks'));
    }

    /**
     * Order the specified resource.
     * Used this articles help for sorting 
     * https://laravelarticle.com/laravel-6-drag-and-drop-menu-sorting 
     */
    public function sort(OrderTaskRequest $request){
        $ids = explode(',', $request->ids);
   
        foreach($ids as $order => $id){
            $task = Task::find($id);
            $task->priority = $order;
            $task->save();
        }

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
