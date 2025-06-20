@extends('layouts.app')

@section('content')
    <div>
        <h2>{{ auth()->user()->name }} の筋トレ履歴</h2>

        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>総時間</th>
                    <th>実施した項目</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{{ $history->execution_date }}</td>
                        <td>{{ gmdate('H:i:s', $history->total_time) }}</td>
                        <td>{{ $history->workout_menus }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('top') }}">トップページに戻る</a>
    </div>
@endsection