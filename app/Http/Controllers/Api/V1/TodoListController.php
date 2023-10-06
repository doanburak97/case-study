<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AssignedTasks;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TodoListController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Application|Factory|View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $datas = AssignedTasks::orderBy('hafta')->orderBy('developer_id')->get();
        $haftalar = $datas->groupBy('hafta');

        return view('todo_list.index', compact('haftalar'));
    }
}
