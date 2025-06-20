@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="max-w-md w-full">
            <h2 class="text-blue-500 text-5xl font-bold mb-6 text-center">運動設定</h2>

            <form method="POST" action="{{ route('workout_execution') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                <div class="mb-4">
                    <h3 class="text-gray-700 text-xl font-semibold mb-2">筋トレタイム</h3>
                    <div class="flex items-center space-x-2">
                        <input type="number" name="exercise_time_minutes" id="exercise_time_minutes" min="0" value="0" required class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <label for="exercise_time_minutes" class="text-gray-700">分</label>
                        
                        <input type="number" name="exercise_time_seconds" id="exercise_time_seconds" min="0" max="59" value="0" required class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <label for="exercise_time_seconds" class="text-gray-700">秒</label>
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-gray-700 text-xl font-semibold mb-2">休憩タイム</h3>
                    <div class="flex items-center space-x-2">
                        <input type="number" name="rest_time_minutes" id="rest_time_minutes" min="0" value="0" required class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <label for="rest_time_minutes" class="text-gray-700">分</label>
                        
                        <input type="number" name="rest_time_seconds" id="rest_time_seconds" min="0" max="59" value="0" required class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        <label for="rest_time_seconds" class="text-gray-700">秒</label>
                    </div>
                </div>

                <!-- 種目選択 -->
                <div class="mb-4">
                    <h3 class="text-gray-700 text-xl font-semibold mb-2">種目選択</h3>
                    <label for="workout_menu" class="block text-gray-700">種目:</label>
                    <select name="workout_menu" id="workout_menu" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">選択してください</option>
                        @foreach ($workoutMenus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        トレーニングを開始
                    </button>
                    <button type="button" onclick="location.href='/top'" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded">
                        戻る
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection