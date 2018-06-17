<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Task;

class SearchController extends Controller
{
    public function findComment(Request $request, $value)
    {
        $comment = Comment::where('comment', 'LIKE', '%'.$value.'%')->get();;

        return response()->json($comment, 200);
    }

    public function findTask(Request $request, $value)
    {
        $task = Task::where('description', 'LIKE', '%'.$value.'%')->get();;

        return response()->json($task, 200);
    }
}
