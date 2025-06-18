<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // 筋トレ種目名を取得（仮に、workout_menus テーブルから取得すると仮定）
        // 実際には、WorkoutMenuモデルを使ってデータベースから種目名を取得する必要があります
        $workoutMenuName = '仮の筋トレ種目'; // ここはモデルから取得するように変更

        // 合計時間を計算
        $totalExerciseTime = ($exerciseTimeMinutes * 60) + $exerciseTimeSeconds;
        $totalRestTime = ($restTimeMinutes * 60) + $restTimeSeconds;

        return view('workout_execution', compact('workoutMenuName', 'totalExerciseTime', 'totalRestTime'));
    }
    public function result(Request $request)
    {
        // 結果表示用の処理
        // 実際には、結果データを取得して表示するためのロジックを追加します
        return view('workout_result'); // 仮のビューレンダリング
    }
}
