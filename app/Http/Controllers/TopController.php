<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// ログ管理
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
            ->first();
            

        if ($todayWorkout) {
            // 既に今日のデータが存在する場合、その時間を取得
            $totalTime = $todayWorkout->total_time;
        } else {
            // 今日のデータが存在しない場合、0に設定
            $totalTime = 0;
        }

        // 時:分:秒に変換
        $hours = floor($totalTime / 3600);
        $minutes = floor(($totalTime % 3600) / 60);
        $seconds = $totalTime % 60;

        // フォーマットして表示
        $formattedTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        
        Log::debug($formattedTime);

        return view('top', compact('formattedTime'));
    }
}
