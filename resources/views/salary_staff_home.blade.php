@extends('layouts.base')
@section('CSS', '/css/style_staff_home.css')
@section('title', 'スタッフ給与明細')

@section('h1', '')



@section('データ一覧')

<div class="frame-1">
  <p class="frame-1-name">勤怠表示</p>

  <div class="frame-2">
    <p class="frame-2-name">勤怠、給与の各画面を表示します</p>
  </div>

  <div class="frame-3">

    <div class="login-buttons">
      <p class="Web_attendance_name">Web勤怠</p>
    <button class="staff-page"><a class="staff-page-link" href="{{url('/salary_attendance_screen',)}}">勤怠入力</a></button>
    <button class="admin-page"><a class="admin-page-page-link" href="">スタッフ情報</a></button>
    </div>
  </div>

  <footer class="footer-salary">
    <p class="footer-name">© 2024 salary </p>
  </footer>
</div>