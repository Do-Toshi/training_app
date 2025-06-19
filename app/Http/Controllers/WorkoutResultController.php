<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutMenu;
use App\Models\WorkoutHistory;

class WorkoutResultController extends Controller
{
    public function result(Request $request)
    {
        // POSTから受け取ったデータを取得
        $workoutMenuId = $request->input('workout-menu-id');
        $startTime = \Carbon\Carbon::parse($request->input('start-time'));
        $endTime = \Carbon\Carbon::parse($request->input('end-time'));

        // 経過時間を計算
        $duration = $endTime->diffInSeconds($startTime);

        // 筋トレ種目名を取得
        $workoutMenu = WorkoutMenu::find($workoutMenuId);
        $workoutMenuName = $workoutMenu ? $workoutMenu->name : '不明な種目';

        // 現在のユーザーのIDを取得
        $userId = auth()->id(); // ログインしているユーザーのID

        // 今日の日付を取得
        $executionDate = now()->toDateString();

        // workout_histories テーブルに保存
        $workoutHistory = WorkoutHistory::where('user_id', $userId)
            ->where('execution_date', $executionDate)
            ->where('workout_menu_id', $workoutMenuId) // メニューIDで検索
            ->first();

        if ($workoutHistory) {
            // データが存在する場合は更新
            $workoutHistory->workout_time += $duration; // 合計時間に新しいdurationを加算
            $workoutHistory->save();
        } else {
            // データが存在しない場合は新規作成
            WorkoutHistory::create([
                'user_id' => $userId,
                'execution_date' => $executionDate,
                'workout_menu_id' => $workoutMenuId, // メニューIDを保存
                'workout_time' => $duration, // 経過時間を保存
            ]);
        }

        return view('workout_result', compact('workoutMenuName', 'duration', 'startTime', 'endTime'));
    }
}
