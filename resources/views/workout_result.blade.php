@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="max-w-md w-full p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-blue-600 text-4xl font-bold mb-6 text-center">トレーニング結果</h2>
            <h3 class="text-gray-800 text-2xl mb-4 text-center">筋トレ種目: <span class="font-semibold">{{ $workoutMenuName }}</span></h3>
            <h4 class="text-xl my-4 text-center">総経過時間: <span class="font-bold">{{ gmdate('H:i:s', $duration) }}</span></h4>

            <div class="mt-6 flex flex-col space-y-4">
                <a href="{{ route('top') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded text-lg text-center">
                    トップページに戻る
                </a>
                <a href="{{ route('workout_setting') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded text-lg text-center">
                    再度筋トレをする
                </a>
            </div>
        </div>
    </div>
@endsection