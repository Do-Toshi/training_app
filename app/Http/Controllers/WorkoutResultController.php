<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workoutmenu;
use App\Models\WorkoutHistory;

class WorkoutResultController extends Controller
{
    public function result(Request $request)
    {
        // POSTから受け取ったデータを取得
        $workoutMenuId = $request->input('workout-menu-id');
        $startTime = \Carbon\Carbon::parse($request->input('start-time'));
        $endTime = \Carbon\Carbon::parse($request->input('end-time'));

        // 開始時間から終了までの差分を計算
        $duration = $endTime->diffInSeconds($startTime);

        // 筋トレ種目名を取得
        $workoutMenu = WorkoutMenu::find($workoutMenuId);
        $workoutMenuName = $workoutMenu ? $workoutMenu->name : '不明な種目';

        // 保存処理---ここから---
        // 現在のユーザーのIDを取得
        $userId = auth()->id();
        // 今日の日付を取得
        $executionDate = now()->toDateString();

        // workout_historiesテーブルからユーザーIDと今日の日付が一致するデータがあるかを検索する
        $workoutHistory = WorkoutHistory::where('user_id',$userId)
            ->where('execution_date',$executionDate)
            ->first();
        
        if ($workoutHistory) {
            // データが存在する場合
            $workoutHistory->total_time += $duration;
            $workoutHistory->save();
        } else {
            // データが存在しない場合
            WorkoutHistory::create([
                'user_id' => $userId,
                'execution_date' => $executionDate,
                'total_time' => $duration,
            ]);
        }
        // 保存処理---ここまで---

        return view('workout_result', compact('workoutMenuName','duration','startTime','endTime'));
    }
}
