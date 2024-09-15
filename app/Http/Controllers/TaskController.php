<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Don't forget to import the Task model

class TaskController extends Controller
{
    // Display the list of tasks
    public function index()
    {
        $tasks = Task::all(); // Retrieve all tasks from the database
        return view('task-views.mytasks', compact('tasks')); // Pass tasks to the view
    }

    // Show the form for creating a new task
    public function showTaskCreationForm()
    {
        return view('task-views.taskform');
    }

    // Store the task in the database
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'task_name' => 'required|string|max:255',
            'task_description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Store the task in the database
        Task::create([
            'task_name' => $request->input('task_name'),
            'description' => $request->input('task_description'),
            'due_date' => $request->input('due_date'),
            'user_id' => auth()->id(),
        ]);

        // Redirect back to the tasks index with a success message
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function update(){

    }

    public function destroy(Task $task){

        $task = Task::findOrFail($task->id);
        $task->delete();

        return redirect()->route('task.index')->with('success', 'Task deleted successfully');
    }

    public function viewTasksInRange(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $tasks = Task::whereBetween('due_date', [$start_date, $end_date])
            ->orderBy('due_date', 'asc')
            ->get();

        return view('task-views.mytasks', compact('tasks'));
    }
}

