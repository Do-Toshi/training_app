@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <div class="">
            <h2 class="text-blue-500 text-7xl font-bold mb-4 text-center">筋トレ管理くん</h2>
            <h3 class="text-gray-700 text-3xl my-6 text-center">今日の筋トレ時間: {{ $formattedTime }}</h3>
            <div class="flex flex-col space-y-4 gap-10 my-14 mx-auto w-1/3">
                <a href="{{ route('workout_setting') }}" class="text-2xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">筋トレを始める</a>
                <a href="{{ route('workout_history') }}" class="text-2xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">履歴</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="text-2xl bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent border-2 rounded w-full text-center">
                        ログアウト
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection