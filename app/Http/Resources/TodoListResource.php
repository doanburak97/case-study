<?php

namespace App\Http\Resources;

use App\Models\TodoList;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin TodoList
 */
class TodoListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'task_ismi' => $this->task_ismi,
            'sure'      => $this->sure,
            'zorluk_derecesi' => $this->zorluk_derecesi,
        ];
    }
}
