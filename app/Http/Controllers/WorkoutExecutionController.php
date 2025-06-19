<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutMenu;

class WorkoutExecutionController extends Controller
{
    public function index(Request $request)
    {
        // フォームから受け取ったデータを取得
        $exerciseTimeMinutes = $request->input('exercise_time_minutes');
        $exerciseTimeSeconds = $request->input('exercise_time_seconds');
        $restTimeMinutes = $request->input('rest_time_minutes');
        $restTimeSeconds = $request->input('rest_time_seconds');
        $workoutMenuId = $request->input('workout_menu');

        // 筋トレ種目名を取得
        $workoutMenu = WorkoutMenu::find($workoutMenuId);
        $workoutMenuName = $workoutMenu ? $workoutMenu->name : '不明な種目';

        // 合計時間を計算
        $totalExerciseTime = ($exerciseTimeMinutes * 60) + $exerciseTimeSeconds;
        $totalRestTime = ($restTimeMinutes * 60) + $restTimeSeconds;

        return view('workout_execution', compact('workoutMenuName', 'totalExerciseTime', 'totalRestTime','workoutMenuId'));
    }
}
