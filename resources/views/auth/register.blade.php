@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="max-w-md w-full">
            <h2 class="text-blue-500 text-5xl font-bold mb-6 text-center">アカウント登録</h2>

            <form method="POST" action="{{ route('register') }}" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('お名前') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('メールアドレス') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('パスワード') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">{{ __('パスワード再確認') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    @error('password_confirmation')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:text-blue-800">
                        {{ __('登録がお済みの方') }}
                    </a>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('登録') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection