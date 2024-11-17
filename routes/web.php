<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/salaryhome', [App\Http\Controllers\salary_Controller::class, 'salary_top']); ///ログイン画面

Route::get('/salary_staff_home', [App\Http\Controllers\salary_Controller::class, 'salary_staff_home_top']); ///スタッフホーム画面

Route::get('/salary_attendance_screen', [App\Http\Controllers\salary_Controller::class, 'attendance_home_top']); ///勤怠画面

Route::post('/Attendance_search', [App\Http\Controllers\salary_Controller::class, 'Attendance_search_update']); ///日付を選択して勤怠画面を表示

Route::post('/Attendance_input', [App\Http\Controllers\salary_Controller::class, 'Attendance_search_input']); ///勤怠を入力する画面

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
