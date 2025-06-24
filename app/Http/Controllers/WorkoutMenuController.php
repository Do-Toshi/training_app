<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkoutMenu;

class WorkoutMenuController extends Controller
{
    public function create()
    {
        return view('workout_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // データベースに新しいトレーニングメニューを追加
        WorkoutMenu::create([
            'name' => $request->name,
        ]);

        return redirect()->route('create_workout_menu')->with('success', '追加が完了しました');
    }
}