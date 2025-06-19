@extends('layouts.app')

@section('content')
    <div>
        <h2>ワークアウト</h2>
        <h3>筋トレ種目: {{ $workoutMenuName }}</h3>
        <h3 id="timer">筋トレタイム</h3>
        <h4>残り時間 <span id="remaining-time">{{ sprintf('%02d:%02d', floor($totalExerciseTime / 60), $totalExerciseTime % 60) }}</span></h4>
        <h4>総経過時間 <span id="total-time">00:00:00</span></h4>

        <form method="POST" action="{{ route('workout_result') }}">
            @csrf
            <input type="hidden" id="workout-menu-id" name="workout-menu-id" value="{{ $workoutMenuId }}">
            <input type="hidden" id="start-time" name="start-time" value="{{ now()->toIso8601String() }}">
            <input type="hidden" id="end-time" name="end-time" value="">
            <button type="submit" id="end-workout">トレーニングを終了</button>
        </form>
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