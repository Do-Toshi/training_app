@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="max-w-md w-full">
            <h2 class="text-blue-500 text-5xl font-bold mb-6 text-center">トレーニングメニュー作成</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('create_workout_menu') }}">
                @csrf
                <div class="mb-4">
                    <h3 class="text-gray-700 text-xl font-semibold mb-2">メニュー名:</h3>
                    <div class="flex items-center">
                        <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="トレーニングメニュー名">
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="text-2xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">作成</button>
                </div>
            </form>
        </div>
    </div>
@endsection