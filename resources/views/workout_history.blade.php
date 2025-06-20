@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <div class="flex flex-col space-y-4 gap-10 my-14 mx-auto w-1/2">
            <h2 class="text-blue-500 text-5xl font-bold mb-4 text-center">{{ auth()->user()->name }} の筋トレ履歴</h2>

            <table class="min-w-full divide-y divide-gray-200 text-xl">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">日付</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">総時間</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">実施した項目</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($histories as $history)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $history->execution_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ gmdate('H:i:s', $history->total_time) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">{{ $history->workout_menus }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6 flex justify-center">
                <a href="{{ route('top') }}" class="text-2xl bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent border-2 rounded text-center">
                    トップページに戻る
                </a>
            </div>
        </div>
    </div>
@endsection