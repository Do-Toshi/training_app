<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TopController extends Controller
{
    public function index()
    {
        // 今日の日付を取得
        $today = Carbon::today();

        // ログインユーザーを取得
        $user = Auth::user();

        // ユーザーの今日の筋トレ時間を取得
        $todayWorkout = WorkoutHistory::where('user_id', $user->id)
            ->where('execution_date', $today)
            ->get();

        // 今日のデータの合計時間を取得
        $workoutTime = $todayWorkout->sum('workout_time');

        // 時:分:秒に変換
        $hours = floor($workoutTime / 3600);
        $minutes = floor(($workoutTime % 3600) / 60);
        $seconds = $workoutTime % 60;

        // フォーマットして表示
        $formattedTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        
        Log::debug($formattedTime);

        return view('top', compact('formattedTime'));
    }
}