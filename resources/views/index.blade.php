@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <h2>あなたの筋トレをもっとスマートに</h2>
                <h3>トレーニングの記録、分析、目標設定を簡単に管理できます</h3>
                {{-- ユーザー登録ページへのリンク --}}
                <a href="{{ route('register') }}">新しく始める</a>
            </div>
        </div>
    </div>
@endsection