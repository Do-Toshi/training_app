@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <div class="flex flex-col space-y-4 gap-10 my-14 mx-auto w-1/3">
            <h2 class="text-blue-500 text-5xl font-bold mb-4 text-center">ワークアウト</h2>
            <h3 class="text-gray-800 text-3xl my-4 text-center">筋トレ種目: <span class="font-semibold">{{ $workoutMenuName }}</span></h3>
            
            <h3 id="timer" class="text-2xl font-semibold my-2 text-center">筋トレタイム</h3>
            <h4 class="text-xl my-2 text-center">残り時間: <span id="remaining-time" class="text-red-600 font-bold">{{ sprintf('%02d:%02d', floor($totalExerciseTime / 60), $totalExerciseTime % 60) }}</span></h4>
            <h4 class="text-xl my-2 text-center">総経過時間: <span id="total-time" class="text-gray-600">00:00:00</span></h4>

            <form method="POST" action="{{ route('workout_result') }}" class="mt-6 text-center">
                @csrf
                <input type="hidden" id="workout-menu-id" name="workout-menu-id" value="{{ $workoutMenuId }}">
                <input type="hidden" id="start-time" name="start-time" value="{{ now()->toIso8601String() }}">
                <input type="hidden" id="end-time" name="end-time" value="">

                <button type="submit" id="end-workout" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded text-lg w-full">
                    トレーニングを終了
                </button>
            </form>
        </div>
    </div>

    <script>
        let exerciseTime = {{ $totalExerciseTime }};
        let restTime = {{ $totalRestTime }};
        let totalElapsedTime = 0;
        let isExerciseTime = true;

        const remainingTimeElement = document.getElementById('remaining-time');
        const totalTimeElement = document.getElementById('total-time');
        const timerHeader = document.getElementById('timer');
        const endWorkoutButton = document.getElementById('end-workout');
        const endTimeInput = document.getElementById('end-time');

        function updateTimer() {
            if (isExerciseTime) {
                if (exerciseTime > 1) {
                    exerciseTime--;
                } else {
                    isExerciseTime = false; // 休憩タイムに切り替え
                    restTime = {{ $totalRestTime }}; // 休憩時間をリセット
                    timerHeader.innerText = '休憩タイム';
                }
            } else {
                if (restTime > 1) {
                    restTime--;
                } else {
                    isExerciseTime = true; // 筋トレタイムに切り替え
                    exerciseTime = {{ $totalExerciseTime }}; // 筋トレタイムをリセット
                    timerHeader.innerText = '筋トレタイム';
                }
            }

            totalElapsedTime++;
            
            // 残り時間を表示
            const minutes = isExerciseTime ? Math.floor(exerciseTime / 60) : Math.floor(restTime / 60);
            const seconds = isExerciseTime ? (exerciseTime % 60) : (restTime % 60);
            remainingTimeElement.innerText = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            
            // 総経過時間を表示
            const totalHours = Math.floor(totalElapsedTime / 3600);
            const totalMinutes = Math.floor((totalElapsedTime % 3600) / 60);
            const totalSeconds = totalElapsedTime % 60;
            totalTimeElement.innerText = `${String(totalHours).padStart(2, '0')}:${String(totalMinutes).padStart(2, '0')}:${String(totalSeconds).padStart(2, '0')}`;

            // 1秒ごとに更新
            setTimeout(updateTimer, 1000);
        }

        // トレーニングを終了ボタンのクリックイベント
        endWorkoutButton.addEventListener('click', function() {
            // トレーニング終了の時間を設定
            const endTime = new Date();
            endTimeInput.value = endTime.toISOString(); // ISO形式で設定
        });

        // タイマーの開始
        updateTimer();
    </script>
@endsection