<?php

namespace App\Console\Commands;

use App\Helpers\DataAdapter;
use App\Http\Controllers\Api\V1\TodoListController;
use App\Models\AssignedTasks;
use App\Models\Developers;
use App\Models\TodoList;
use App\Repositories\Provider1ToDoListRepository;
use App\Repositories\Provider2ToDoListRepository;
use Exception;
use Illuminate\Console\Command;

class FetchTodoLists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:todo-lists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store todo lists from API';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(DataAdapter $adapter): void
    {
        //first provider
        $provider1Service = new Provider1ToDoListRepository();
        $todo1ListData = $provider1Service->getTodoList();

        //second provider
        $provider2Service = new Provider2ToDoListRepository();
        $todo2ListData = $provider2Service->getTodoList();

        $commonFormatData1 = $adapter->adaptType1Data($todo1ListData);
        $commonFormatData2 = $adapter->adaptType2Data($todo2ListData);

        $commonFormatData = array_merge($commonFormatData1, $commonFormatData2);

        foreach ($commonFormatData as $item) {
            $existingData = TodoList::where('task_ismi', $item['task_ismi'])->first();

            if (!$existingData) {
                TodoList::create([
                    'task_ismi' => $item['task_ismi'],
                    'sure' => $item['sure'],
                    'zorluk_derecesi' => $item['zorluk_derecesi'],
                ]);
            }
        }

        $this->assignTasks();

        $this->info('Data imported successfully.');
    }

    /**
     * @return void
     */
    public function assignTasks(): void
    {
        $tasks = TodoList::orderByDesc('zorluk_derecesi')
            ->orderByDesc('sure')
            ->get();

        $developers = Developers::orderByDesc('zorluk')
            ->orderByDesc('sure')
            ->get();

        foreach ($developers as $developer) {
            $developer->haftalik_calisma_saatleri = 0;
            $developer->hafta = 1;
        }

        $hafta = 1;

        while (!$tasks->isEmpty()) {
            foreach ($developers as $developer) {
                if ($tasks->isEmpty()) {
                    break;
                }

                $haftalikCalismaSaatleri = $developer->haftalik_calisma_saatleri;
                $hourlyWorkload = $developer->zorluk * $developer->sure;

                $task = $tasks->shift();

                $estimated_hours = ($task?->zorluk_derecesi * $task?->sure) / $hourlyWorkload;

                if (($haftalikCalismaSaatleri + $estimated_hours) <= 45) {

                    $assignTask = new AssignedTasks();
                    $developer->haftalik_calisma_saatleri += $estimated_hours;
                    $assignTask->developer_id = $developer->id;
                    $assignTask->task_id = $task->id;
                    $assignTask->hafta = $developer->hafta;
                    $assignTask->save();
                } else {
                    $developer->hafta++;
                    $developer->haftalik_calisma_saatleri = 0;
                    $tasks->push($task);
                }
            }

            if ($hafta == 1 && $tasks->isEmpty()) {
                break;
            }
        }
    }
}
