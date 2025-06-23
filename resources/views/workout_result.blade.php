@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="max-w-md w-full">
            <h2 class="text-blue-500 text-5xl font-bold mb-6 text-center">トレーニング結果</h2>
            <h3 class="text-gray-800 text-2xl mb-4 text-center">筋トレ種目: <span class="font-semibold">{{ $workoutMenuName }}</span></h3>
            <h4 class="text-xl my-4 text-center">総経過時間: <span class="font-bold">{{ gmdate('H:i:s', $duration) }}</span></h4>

            <div class="mt-6 flex flex-col space-y-4">
                <a href="{{ route('top') }}" class="text-2xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">
                    トップページに戻る
                </a>
                <a href="{{ route('workout_setting') }}" class="text-2xl bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent border-2 rounded text-center">
                    再度筋トレをする
                </a>
            </div>
        </div>
    </div>
@endsection