<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutMenu;

class WorkoutSettingController extends Controller
{
    public function index() 
    {
        $workoutMenus = WorkoutMenu::all();
        
        return view('workout_setting',compact('workoutMenus'));
    }
}
