@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center mt-10">
        <div class="max-w-2xl text-center">
            <h2 class="text-blue-500 text-5xl font-bold my-4">あなたの筋トレをもっとスマートに</h2>
            <h2 class="text-red-500 text-7xl font-bold my-10">筋トレ管理くん</h2>
            <h3 class="text-gray-700 text-2xl my-6">トレーニングの記録、分析、目標設定を簡単に管理できます</h3>
            <div class="flex flex-col space-y-4 gap-10 my-14 mx-auto w-1/2">
                {{-- ユーザー登録ページへのリンク --}}
                <a href="{{ route('register') }}" class="text-xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">新しく始める</a>
                <a href="{{ route('login') }}" class="text-xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">既にアカウントをお持ちの方</a>
            </div>
        </div>
    </div>
@endsection