<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutHistory extends Model
{
    use HasFactory;

    protected $table = 'workout_histories';

    protected $fillable = [
        'user_id',
        'execution_date',
        'total_time',
    ];
}
