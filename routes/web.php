<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// For Task creation form and task management
use App\Http\Controllers\TaskController;

Route::get('/mytasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'showTaskCreationForm'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/mytasks/all', [TaskController::class, 'viewTasksInRange'])->name('viewTasksInRange');
Route::get('/mytasks/{task}/edit', [TaskController::class, 'update'])->name('tasks.edit');
Route::delete('/mytasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


// For Team building and team management
use App\Http\Controllers\TeamBuilderController;

Route::get('/myteam', [TeamBuilderController::class, 'index'])->name('team.index');
Route::get('/myteam/create', [TeamBuilderController::class, 'create'])->name('team.create');
Route::post('/teams', [TeamBuilderController::class, 'store'])->name('team.store');
