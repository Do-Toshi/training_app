<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;
use App\Models\WorkoutMenu;

class WorkoutHistoryController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // ユーザーの筋トレ履歴を日付毎に集計
        $histories = WorkoutHistory::where('user_id',$userId)
            ->selectRaw('execution_date, SUM(workout_time) as total_time')
            ->groupBy('execution_date')
            ->orderBy('execution_date','desc')
            ->with('workoutMenu')
            ->get();

        // 各日付毎の実施したワークアウトの名前を取得
        foreach ($histories as $history) {
            $history->workout_menus = WorkoutHistory::where('user_id',$userId)
                ->where('execution_date',$history->execution_date)
                ->with('workoutMenu')
                ->get()
                ->pluck('workoutMenu.name')
                ->implode(',');
        }

        return view('workout_history',compact('histories'));
    }
}