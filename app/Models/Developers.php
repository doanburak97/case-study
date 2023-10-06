<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\TodoList
 *
 * @property int $id
 * @property string|null developer
 * @property int|null $sure
 * @property int|null $zorluk
 */
class Developers extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'developer',
        'sure',
        'zorluk',
        'haftalik_is_yuku'
    ];
}
