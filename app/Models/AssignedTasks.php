<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\TodoList
 *
 * @property int $id
 * @property int|null $task_id
 * @property int|null developer_id
 * @property int|null hafta
 */
class AssignedTasks extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'task_id',
        'developer_id',
        'hafta',
    ];
}
