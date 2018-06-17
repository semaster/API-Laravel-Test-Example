<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function show($id)
    {
        return response()->json(Task::find($id), 200);
    }
    public function comments($id)
    {
        $task = Task::findOrFail($id);

        return response()->json($task->comments, 200);
    }
}
