<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $tasks = Task::orderBy('updated_at', 'desc')->paginate(10);
        return view("tasks.index", compact(['tasks', 'i']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'completed' => 'nullable|boolean'
        ]);
        
        $taskData = $request->all();
        $taskData['completed'] = $request->has('completed') ? 1 : 0;
        Task::create($taskData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact(['task']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact(['task']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'completed' => 'nullable|boolean'
        ]);        
        $taskData = $request->all();
        $taskData['completed'] = $request->has('completed') ? 1 : 0;
        $task = Task::findOrFail($id);
        $task->update($taskData);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Deleted Successfully');
    }
}
