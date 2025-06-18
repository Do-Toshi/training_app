<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutMenu extends Model
{
    use HasFactory;

    protected $table = 'workout_menus';

    protected $fillable = [
        'name',
    ];
}
