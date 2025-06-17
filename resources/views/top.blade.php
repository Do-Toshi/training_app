@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <h2>筋トレ管理くん</h2>
                <h3>今日の筋トレ時間:{{--ここに今日の筋トレ時間の総時間を入れる--}}</h3>
                <a href="#">筋トレを始める</a> {{-- {{ route('workout_setting') }} --}}
                <a href="#">履歴</a>{{-- {{ route('workout_history') }} --}}
                <a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a>
            </div>
        </div>
    </div>
@endsection