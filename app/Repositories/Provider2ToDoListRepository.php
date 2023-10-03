<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Http;

class Provider2ToDoListRepository implements ToDoListRepositoryInterface
{

    /**
     * @throws Exception
     */
    public function getTodoList(): mixed
    {
        $response = Http::get('http://www.mocky.io/v2/5d47f235330000623fa3ebf7');

        if ($response->successful()){
            return $response->json();
        }

        return throw new Exception('Provider 2 API request failed');
    }
}
