<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('todo')->get();
        return view('/todo.index', ['items' => $items]);
    }

    public function routing(TodoRequest $request)
    {
        if ($request->input('create')) {
            $this->create($request);
            $items = DB::table('todo')->get();
            return view('/todo.index', ['items' => $items]);
        } elseif ($request->input('update')) {
            $this->update($request);
            $items = DB::table('todo')->get();
            return view('/todo.index', ['items' => $items]);
        } else {
            $this->delete($request);
            $items = DB::table('todo')->get();
            return view('/todo.index', ['items' => $items]);
        }
    }

    public function create(Request $request)
    {
        $param = [
            'content' => $request->content
        ];
        DB::table('todo')->insert($param);
    }

    public function update(Request $request)
    {
        $param = [
            'content' => $request->content
        ];
        DB::table('todo')->where('id', $request->id)->update($param);
    }

    public function delete(Request $request)
    {
        DB::table('todo')->where('id', $request->id)->delete();
    }
}
