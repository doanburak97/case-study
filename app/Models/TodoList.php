<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\TodoList
 *
 * @property int $id
 * @property string|null $task_ismi
 * @property int|null $sure
 * @property int|null $zorluk_derecesi
 */
class TodoList extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'task_ismi',
        'sure',
        'zorluk_derecesi',
    ];
}
