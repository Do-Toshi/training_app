<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\WorkoutSettingController;
use App\Http\Controllers\WorkoutExecutionController;
use App\Http\Controllers\WorkoutResultController;
use App\Http\Controllers\WorkoutHistoryController;
use App\Http\Controllers\WorkoutMenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        // ログインしているユーザーの場合
        return redirect()->route('top');
    }
    
    // ログインしていない場合
    return view('index');
})->name('index');

Route::get('/top', [TopController::class, 'index'])->middleware(['auth', 'verified'])->name('top');
Route::get('/workout_setting', [WorkoutSettingController::class, 'index'])->middleware(['auth', 'verified'])->name('workout_setting');
Route::post('/workout_execution',[WorkoutExecutionController::class,'index'])->middleware(['auth', 'verified'])->name('workout_execution');
Route::post('/workout_result', [WorkoutResultController::class,'result'])->name('workout_result');
Route::get('/workout_history',[WorkoutHistoryController::class,'index'])->name('workout_history');
Route::get('/create_workout_menu', [WorkoutMenuController::class, 'create'])->name('create_workout_menu');
Route::post('/create_workout_menu', [WorkoutMenuController::class, 'store'])->name('create_workout_menu');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
