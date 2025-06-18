@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <h2>筋トレ管理くん</h2>
                <h3>今日の筋トレ時間:{{ $formattedTime }}</h3>
                <a href="{{ route('workout_setting') }}">筋トレを始める</a> {{-- {{ route('workout_setting') }} --}}
                <a href="#">履歴</a>{{-- {{ route('workout_history') }} --}}
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <a class="link link-hover" href="#" onclick="event.preventDefault(); this.closest('form').submit();">ログアウト</a>
                </form>
            </div>
        </div>
    </div>
@endsection