<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;
use App\Models\WorkoutMenu;
use Illuminate\Support\Facades\DB;

class WorkoutHistoryController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // ユーザーの筋トレ履歴を日付毎に集計し、実施したメニュー名を取得
        $histories = WorkoutHistory::select('execution_date', DB::raw('SUM(workout_time) as total_time'))
            ->with(['workoutMenu' => function ($query) {
                $query->select('id', 'name');
            }])
            ->where('user_id', $userId)
            ->groupBy('execution_date')
            ->orderBy('execution_date', 'desc')
            ->get();

        // 実施したワークアウトの名前を取得
        $histories->transform(function ($history) use ($userId) {
            $workoutMenus = WorkoutHistory::where('user_id', $userId)
                ->where('execution_date', $history->execution_date)
                ->with('workoutMenu')
                ->get()
                ->pluck('workoutMenu.name')
                ->implode(', ');

            $history->workout_menus = $workoutMenus;
            return $history;
        });

        return view('workout_history', compact('histories'));
    }
}