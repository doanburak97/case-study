<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Http;

class Provider1ToDoListRepository implements ToDoListRepositoryInterface
{

    /**
     * @throws Exception
     */
    public function getTodoList(): mixed
    {
        $response = Http::get('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa');

        if ($response->successful()){
            return $response->json();
        }

        return throw new Exception('Provider 1 API request failed');
    }
}
