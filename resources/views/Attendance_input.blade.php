@extends('layouts.base')
@section('CSS', '/css/style_attendance_screen.css')
@section('title', '勤怠入力')

@section('h1', '')



@section('データ一覧')

<div class="frame-1">
  <p class="frame-1-name">勤怠入力</p>
 
  <div class="frame-2">
    <p class="frame-2-name">日々の勤怠情報を入力します。</p>
  </div>

  <div class="frame-3">
    <form method="post" name="sousin" action="{{ url('Attendance_search') }}">
      {{ csrf_field() }}
      <p class="year_and_month">年月:</p>
      <div class="year_and_month_selectbox">
        <select name="year_select" class="year_select_css" id="year_select_get_js" onchange="year_get()">
          <option value="{{$year}}">{{$year}}</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>

        <p class="year">年</p>

        <select name="month_select" class="month_select_css" id="month_select" onchange="month_get()">
          <option value="{{$month}}">{{$month}}</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>

        <p class="month">月</p>
        <p class="Western_calendar_display">({{$year}}年{{$string_beginning_of_the_month}}～{{$string_end_of_month}})</p>
        <input class="update_button" name="update_button" type="submit" value="表示">
        <input class="Attendance_button" name="update_button" type="submit" value="勤怠入力">
    </form>
  </div>

  <div class="table-scroll">
    <form method="post" name="Attendance_input" action="{{ url('Attendance_input') }}">

      <!--year_selectで選択した年をJSで処理してyear_inputのvalueに代入している  -->
      <input type="hidden" class="year_input" id="year_input" name="year_input" value="" />

      <!--month_selectで選択した月をjsで処理してmonth_inputのvalueに代入している  -->
      <input type="hidden" class="month_input" id="month_input" name="month_input" value="" />

      <input class="Registration_button" name="Registration_button" type="submit" value="登録">
      {{ csrf_field() }}
      <table class="table_design10 table_pos">
        <tbody>
          <tr>
            <th>日付</th>
            <th>出勤区分</th>
            <th>シフト</th>
            <th>開始時刻</th>
            <th>終了時刻</th>
            <th>休憩(分)</th>
            <th>残業休憩(分)</th>
            <th>深夜休憩(分)</th>
            <th>備考</th>
            <th>実働時間</th>
            <th>承認者</th>
          </tr>

          @foreach ($dates2 as $date)
          <tr>
            <td>{{ $date[0] }}</td><!--日付-->
            <input type="hidden" name="date_number{{$loop->iteration}}" value="{{ $date[0] }}" />
            <td><select name="attendance_at_work{{$loop->iteration}}" id="attendance_at_work{{$loop->iteration}}"><!-- 出勤-->
                <option value="入力なし"></option>
                <option value="出勤">出勤</option>
                <option value="欠勤">欠勤</option>
                <option value="早退">早退</option>
                <option value="休日">休日</option>
                <option value="有給">有給</option>
              </select></td>

            <td></td><!-- シフト-->
            <td><input type="number" list="{{$loop->index}}" id="start_time1" class="start_time1" name="start_time1{{$loop->iteration}}" onchange="start_time_get(this)" onclick="workcheck(this)" min="0" max="23" />:<input type="number" list="{{$loop->index}}" id="start_time2" class="start_time2" name="start_time2{{$loop->iteration}}" onchange="start_time_get(this)" onclick="workcheck(this)"min="0" max="23" /></td><!-- 開始時刻 -->
            <td><input type="number" list="{{$loop->index}}" id="end_time1" class="end_time1" name="end_time1{{$loop->iteration}}" onchange="start_time_get(this)" onclick="workcheck(this)" min="0" max="23"/>:<input type="number" list="{{$loop->index}}" id="end_time2" class="end_time2" name="end_time2{{$loop->iteration}}" onchange="start_time_get(this)" onclick="workcheck(this)"min="0" max="23" /></td><!-- 終了時刻-->
            <td><input type="number" list="{{$loop->index}}" class="break_time" name="break_time{{$loop->iteration}}" onchange="Break_time(this)" onclick="workcheck(this)"/></td><!-- 休憩(分) -->
            <td><input type="number" class="overtime_break_time" name="overtime_break_time" /></td><!-- 残業休憩(分) -->
            <td><input type="number" class="late_night_break_time" name="late_night_break_time" /></td><!-- 深夜休憩(分)-->
            <td><input type="text" id="remarks" name="remarks" maxlength="200" size="10" /></td><!-- 備考 -->
            <td><input type="number" id="actual_working_hours1" class="actual_working_hours1" name="actual_working_hours1{{$loop->iteration}}" />:<input type="number" class="actual_working_hours2" name="actual_working_hours2{{$loop->iteration}}" /></td><!-- 実働時間 -->
            <td></td><!-- 承認者 -->
          </tr>
          @endforeach
           <!-- 外部のJavaScriptファイルを読み込む -->
        
        </tbody>
      </table>
    </form>
  </div>
  
</div>
</div>

<footer class="footer-salary">
  <p class="footer-name">© 2024 salary </p>
</footer>
</div>