<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class TodoListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $todoLists = TodoList::paginate(10);

        //return response()->json($todoLists);
        return view('todo_list.index', compact('todoLists'));
    }
}
