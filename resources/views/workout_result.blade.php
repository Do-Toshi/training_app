@extends('layouts.app')

@section('content')
    <div>
        <h2>トレーニング結果</h2>
        <h3>筋トレ種目： {{ $workoutMenuName }}</h3>
        <h4>総経過時間： {{ gmdate('H:i:s', $duration) }}</h4>
        <a href="{{ route('top') }}">トップページに戻る</a>
        <a href="{{ route('workout_setting') }}">再度筋トレをする</a>
    </div>
@endsection