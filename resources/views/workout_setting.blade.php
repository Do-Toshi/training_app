@extends('layouts.app')

@section('content')
    <div>
        <h2>運動設定</h2>

        <form method="POST" action="{{ route('workout_execution') }}"> {{-- route('workout_execution') --}}
            @csrf

            <div>
                <h3>筋トレタイム</h3>
                <input type="number" name="exercise_time_minutes" id="exercise_time_minutes" min="0" value="0" required>
                <label for="exercise_time_minutes">分</label>
                
                <input type="number" name="exercise_time_seconds" id="exercise_time_seconds" min="0" max="59" value="0" required>
                <label for="exercise_time_seconds">秒</label>
            </div>
            
            <div>
                <h3>休憩タイム</h3>
                <input type="number" name="rest_time_minutes" id="rest_time_minutes" min="0" value="0" required>
                <label for="rest_time_minutes">分</label>
                
                <input type="number" name="rest_time_seconds" id="rest_time_seconds" min="0" max="59" value="0" required>
                <label for="rest_time_seconds">秒</label>
            </div>
            
            <div>
                <h3>種目選択</h3>
                <label for="workout_menu">種目:</label>
                <select name="workout_menu" id="workout_menu" required>
                    <option value="">選択してください</option>
                    @foreach ($workoutMenus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit">トレーニングを開始</button>
            <button type="button" onclick="location.href='/top'">戻る</button>
        </form>
    </div>
@endsection
