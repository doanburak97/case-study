<?php

namespace App\Console\Commands;

use App\Helpers\DataAdapter;
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

        $this->info('Data imported successfully.');
    }
}
