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
        <select name="year_select" class="year_select_css">
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
        </select>
        <p class="year">年</p>

        <select class="month_select_css" name="month_select">
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


    <form method="post" name="Attendance_update" action="{{ url('Attendance_input') }}">
        {{ csrf_field() }}
      

    </form>

  </div>

  <div class="table-scroll">
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
          <td> @if (!empty($recodes[$loop->index]) && is_object($recodes[$loop->index]))
              {{ $recodes[$loop->index]->Work_classification }}
            @else
               <!-- または適切なデフォルト値 -->
            @endif</td><!-- 出勤区分-->
          <td>{{$loop->iteration}}</td><!-- シフト -->

          <td>@if (!empty($recodes[$loop->index]) && is_object($recodes[$loop->index]))
              {{ $recodes[$loop->index]->Start_time }}
            @else
               <!-- または適切なデフォルト値 -->
            @endif</td><!-- 開始時刻 -->
          <td>@if (!empty($recodes[$loop->index]) && is_object($recodes[$loop->index]))
              {{ $recodes[$loop->index]->End_time }}
            @else
               <!-- または適切なデフォルト値 -->
            @endif</td><!-- 終了時刻 -->
          <td></td><!-- 休憩(分) -->
          <td></td><!-- 残業休憩(分) -->
          <td></td><!-- 深夜休憩(分) -->
          <td></td><!-- 備考 -->
          <td></td><!-- 実働時間 -->
          <td></td><!-- 承認者 -->
        </tr>
       
         @endforeach
      </tbody>
    </table>
  </div>

</div>
</div>

<footer class="footer-salary">
  <p class="footer-name">© 2024 salary </p>
</footer>
</div>