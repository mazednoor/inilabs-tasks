<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    public function index(Request $request){
        return Todo::latest()->get();
    }

    public function store(Request $request){
        $todo = new Todo();
        $todo->todo = $request->get('todo');
        $todo->save();

        return response()->json([
            'message' => 'Todo Successfully created.'
        ]);
    }

    public function delete(Request $request){
        $todo = Todo::find($request->get('id'));
        $todo->delete();

        return response()->json([
            'message' => 'Todo Successfully deleted.'
        ]);
    }

    public function complete(Request $request){
        $todo = Todo::find($request->get('id'));
        $todo->is_completed = true;
        $todo->update();

        return response()->json([
            'message' => 'Todo Successfully completed.'
        ]);
    }

    public function uncomplete(Request $request){
        $todo = Todo::find($request->get('id'));
        $todo->is_completed = false;
        $todo->update();

        return response()->json([
            'message' => 'Todo Successfully uncompleted.'
        ]);
    }

    public function update(Request $request){
        $todo = Todo::find($request->get('id'));
        $todo->todo = $request->get('todo');
        $todo->update();

        return response()->json([
            'message' => 'Todo Successfully updated.'
        ]);
    }

}
