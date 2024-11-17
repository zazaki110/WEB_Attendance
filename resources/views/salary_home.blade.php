@extends('layouts.base')
@section('CSS', '/css/style.css')
@section('title', '給与明細TOP')

@section('h1', '')



@section('データ一覧')

<div class="frame-1">
  <p class="frame-1-name">勤怠・給与</p>

  <div class="frame-2">
    <p class="frame-2-name">○○○○システム会社</p>
  </div>

  <div class="frame-3">
    <div class="login-buttons">
    <button class="staff-page"><a class="staff-page-link" href="{{url('/salary_staff_home',)}}">staffログイン</a></button>
    <button class="admin-page"><a class="admin-page-page-link" href="">管理者ログイン</a></button>
    </div>
  </div>

  <footer class="footer-salary">
    <p class="footer-name">© 2024 salary </p>
  </footer>
</div>