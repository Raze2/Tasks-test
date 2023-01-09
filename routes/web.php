<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('tasks/sort', [TaskController::class, 'sortView'])->name('tasks.sortView');
Route::post('tasks/sort', [TaskController::class, 'sort'])->name('tasks.sort');
Route::resource('tasks', TaskController::class)->only('index', 'create', 'store', 'destroy');
Route::resource('projects', ProjectController::class)->only('index', 'create', 'store', 'destroy');