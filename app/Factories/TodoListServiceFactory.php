<?php

namespace App\Factories;

use App\Repositories\Provider1ToDoListRepository;
use App\Repositories\Provider2ToDoListRepository;

class TodoListServiceFactory
{
    /**
     * @param $provider
     * @return Provider2ToDoListRepository|Provider1ToDoListRepository
     */
    public static function createService($provider): Provider2ToDoListRepository|Provider1ToDoListRepository
    {
        if ($provider === 'provider1'){
            return new Provider1ToDoListRepository();
        } elseif ($provider === 'provider2'){
            return new Provider2ToDoListRepository();
        }

        throw new \InvalidArgumentException('Invalid API Provider selected');
    }
}
