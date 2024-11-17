<?php

namespace App\Http\Controllers;
use App\Models\user_attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class salary_Controller extends Controller
{
    public function salary_top() //給与明細ログイン画面
    {
        return view('salary_home');
    }

    public function salary_staff_home_top() //給与明細staff画面
    {
        return view('salary_staff_home');
    }

    public function attendance_home_top() //勤怠表画面
    {
        $now = Carbon::now();
        $now_month = $now->month; ///現在の日時から月だけ取得
        $now_day = $now->day; ///現在日時から日だけ取得
        $year = $now->year;///現在の西暦を取得
        
        $from = date('Y-m-01'); // 月の初日
        $to = date('Y-m-t'); // 月の末日
        $day_of_week = date('Y-m-01-w'); //数値で曜日を取得

        // 選択した西暦の月の初日を取得
        $startOfMonth = Carbon::create($from)->startOfDay();
        // 選択した西暦の月の最終日を取得
        $endOfMonth = Carbon::create($to)->endOfMonth()->endOfDay();

        // 日付の範囲を取得
        $datesInRange = Carbon::parse($startOfMonth)->daysUntil($endOfMonth);

        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];

        $counter = -1;//for文カウンター

        // 結果を出力
        foreach ($datesInRange as $date) {

            $counter++;
            //$dates=[$counter]=[$date->format('m/d'.'('.$week[$date->format('w')]).')'];
            $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
            $dates2[$counter] = $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
            $dates3[$counter] = $dates1 = [$date->format('m/d')];

        }
        $beginning_of_the_month = $dates3[0]; //月初を取得
        $end_of_month = $dates3[array_key_last($dates3)]; //月末を取得
        implode($beginning_of_the_month);
        implode($end_of_month);
        $string_beginning_of_the_month = implode(', ', $beginning_of_the_month);
        $string_end_of_month = implode(', ', $end_of_month);
        //dd($dates2[0]);
        //dd($dates2[2]);
/////////////////////////↑ここまで日付取得↑////////////////////////////////////////



////////////////////////↓ここからDB取得↓//////////////////////////////////////////

//$recodes = user_attendance::where('user_id', $user)->whereYear('created_at', $seireki)->whereMonth('created_at', $tuki)->exists();

////for($i=1; $i<31; $i++){
    //$recodes[$i] = user_attendance::where('User_id', 1)->whereYear('date', 2024)->whereMonth('date', 7)->whereDay('date',$i )->first();
//}
//dd($recodes);

for($i=1; $i<31; $i++){
    $recodes[$i] = user_attendance::where('User_id', 1)->whereYear('date', 2024)->whereMonth('date', 7)->whereDay('date',$i )->first()?? null;
   //$recodes[$i] = $recodes[$i] == null  ? "" : user_attendance::where('User_id', 1)->whereYear('date', 2024)->whereMonth('date', 7)->whereDay('date',$i )->first();
   //$recodes[$i] = $recodes[$i] ?? "";//null合体演算子

    //if($recodes[$i]==null){
       /// $recodes[$i] = [
        //    'User_id' => '',
        //];
   // }
}

//$recodes[0] = user_attendance::where('User_id', 1)->whereYear('date', 2024)->whereMonth('date', 7)->whereDay('date',11 )->first();
//$recodes = user_attendance::where('User_id', 1)->whereYear('date', 2024)->whereMonth('date', 7)->whereDay('date', )->get();

     //dd($recodes);
     if(is_array($recodes)==true){
       //dd($recodes);
        //dd("配列です");

     }
     else{

       //dd("配列じゃないです");
     }


        return view('Attendance', compact('dates2', 'year', 'string_beginning_of_the_month','string_end_of_month','recodes'));
    }


    




    public function Attendance_search_update(Request $request)
    {
        $input_value = $request->update_button; ///ボタンの名前
        //dd($input_value);
        if ($input_value == '表示') {

            $year = $request->year_select;
            $month = $request->month_select;

            $from = date($year.'-'.$month.'-01'); // 今月の初日
            $to = date($year.'-'.$month.'-t'); // 今月の末日

            $to = Carbon::create($year, $month)->endOfMonth();
            //dd($to);
            $day_of_week = date($from.'-'.$to.'-'.'w'); //数値で曜日を取得
            //dd($day_of_week);
            // 2024年6月の初日を作成
            $startOfMonth = Carbon::create($from)->startOfDay();

            // 2024年6月の最終日を作成
            $endOfMonth = Carbon::create($to)->endOfMonth()->endOfDay();

            // 日付の範囲を取得
            $datesInRange = Carbon::parse($startOfMonth)->daysUntil($endOfMonth);

            //dd($datesInRange);
            $week = [
                '日', //0
                '月', //1
                '火', //2
                '水', //3
                '木', //4
                '金', //5
                '土', //6
            ];

            $counter = -1;

            // 結果を出力
            foreach ($datesInRange as $date) {

                $counter++;

                // dump($date->format('m/d'.'('.$week[$date->format('w')]).')');

                //$dates=[$counter]=[$date->format('m/d'.'('.$week[$date->format('w')]).')'];
                $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
                $dates2[$counter] = $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
                $dates3[$counter] = $dates1 = [$date->format('m/d')];
                //dd($dates3[0]);
                //dump($date->format('m/d'.'('.$week[$date->format('w')]).')');
            }
            //dd(count($dates3));
            $beginning_of_the_month = $dates3[0]; //月初を取得
            $end_of_month = $dates3[array_key_last($dates3)]; //月末を取得
            implode($beginning_of_the_month);
            implode($end_of_month);
            $string_beginning_of_the_month = implode(', ', $beginning_of_the_month);
            $string_end_of_month = implode(', ', $end_of_month);


            return view('Attendance', compact('dates2', 'year', 'month', 'string_beginning_of_the_month','string_end_of_month'));

        } else {


            $year = $request->year_select;
            $month = $request->month_select;
            //dd($year);

            $from = date($year.'-'.$month.'-01'); // 今月の初日
            //dd($from);
            $to = date($year.'-'.$month.'-t'); // 今月の末日
            $to = Carbon::create($year, $month)->endOfMonth();
            //dd($to);
            $day_of_week = date($from.'-'.$to.'-'.'w'); //数値で曜日を取得
            //dd($day_of_week);
            // 2024年6月の初日を作成
            //dd($from);
            $startOfMonth = Carbon::create($from)->startOfDay();

            // 2024年6月の最終日を作成
            $endOfMonth = Carbon::create($to)->endOfMonth()->endOfDay();

            // 日付の範囲を取得
            $datesInRange = Carbon::parse($startOfMonth)->daysUntil($endOfMonth);

            //dd($datesInRange);
            $week = [
                '日', //0
                '月', //1
                '火', //2
                '水', //3
                '木', //4
                '金', //5
                '土', //6
            ];

            $counter = -1;

            // 結果を出力
            foreach ($datesInRange as $date) {

                $counter++;
                $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
                $dates2[$counter] = $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
                $dates3[$counter] = $dates1 = [$date->format('m/d')];
               
            }
            //dd(count($dates3));
            $beginning_of_the_month = $dates3[0]; //月初を取得
            $end_of_month = $dates3[array_key_last($dates3)]; //月末を取得
            implode($beginning_of_the_month);
            implode($end_of_month);
            $string_beginning_of_the_month = implode(', ', $beginning_of_the_month);
            $string_end_of_month = implode(', ', $end_of_month);


            return view('Attendance_input', compact('dates2', 'year', 'month', 'from', 'to','string_beginning_of_the_month','string_end_of_month'));
        }

    }


    public function Attendance_search_input(Request $request)
    {
        
         for($i=1; $i<31; $i++){
            $input_dates[$i] = [
                '日付'=> $request->input("year_input")."/".$request->input("date_number$i"),
                '出勤区分'=>[$request->input("attendance_at_work$i")],
                '勤務開始時間1'=>[$request->input("start_time1$i")],
                '勤務開始時間2'=>[$request->input("start_time2$i")],
                '勤務終了時間1'=>[$request->input("end_time1$i")],
                '勤務終了時間2'=>[$request->input("end_time2$i")],
                '休憩時間'=>[$request->input("break_time$i")]
            ];
            //$input_dates[]=$request->input("date_number$i");
         }
         dd($input_dates[1]['日付']);
         //d($input_dates[3]['出勤区分']);
            //dd($input_dates[1]["休憩時間"]);
        // データベースに登録
        foreach ($input_dates as $date_data) {
            //dd($date_data['出勤区分']);
        // 日付データが存在する場合のみ登録
         if (implode($date_data['出勤区分'])==0) {
            //dd("出勤区分が0です");
            //return;
         }
         else{
         $User_Attendance = new user_Attendance();
        $hiduke1= user_attendance::where('date','=',$date_data['日付'])->value('date');
        $hiduke2= $date_data['日付'];
        //dd($hiduke1);
        //dd($date_data['日付']);
           if($hiduke1==$hiduke2){
            //dd("同じ日付です");
            user_attendance::where('date', $date_data['日付'])->update([
             'Work_classification' =>  implode($date_data['出勤区分']), //出勤区分
             'Start_time' =>implode($date_data['勤務開始時間1']). implode($date_data['勤務開始時間2']),//勤務開始時間
             'End_time' =>implode($date_data['勤務終了時間1']). implode($date_data['勤務終了時間2']),//勤務開始時間
             'Break_time'=>implode($date_data['休憩時間']),
            ]);

        }
        else{
            //dd("出勤区分が1です");
            $User_Attendance->create([
                'date' => $date_data['日付'], //日付
                 'Work_classification' =>  implode($date_data['出勤区分']), //出勤区分
                 'Start_time' =>implode($date_data['勤務開始時間1']). implode($date_data['勤務開始時間2']),//勤務開始時間
                 'End_time' =>implode($date_data['勤務終了時間1']). implode($date_data['勤務終了時間2']),//勤務開始時間
                 'Break_time'=>implode($date_data['休憩時間']),
                 
             ]);
          }
        }
         }
         
        // $end_time1 = is_array($date_data['勤務終了時間1']) ? implode('', $date_data['勤務終了時間1']) : $date_data['勤務終了時間1'];
         //$end_time2 = is_array($date_data['勤務終了時間2']) ? implode('', $date_data['勤務終了時間2']) : $date_data['勤務終了時間2'];
        
         

         //dd($input_dates[1]['日付']);

        //$input_date = $request->date_number1; ///日付
        

        $year = $request->year_input;
        $month = $request->month_input;
        //dd($year);
        //dd($month);
        $from = date($year.'-'.$month.'-01'); // 今月の初日
        $to = date($year.'-'.$month.'-t'); // 今月の末日

        $to = Carbon::create($year, $month)->endOfMonth();
        //dd($to);
        $day_of_week = date($from.'-'.$to.'-'.'w'); //数値で曜日を取得
        //dd($day_of_week);
        // 2024年6月の初日を作成
        $startOfMonth = Carbon::create($from)->startOfDay();

        // 2024年6月の最終日を作成
        $endOfMonth = Carbon::create($to)->endOfMonth()->endOfDay();

        // 日付の範囲を取得
        $datesInRange = Carbon::parse($startOfMonth)->daysUntil($endOfMonth);

        //dd($datesInRange);
        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];
        $counter = -1;

        // 結果を出力
        foreach ($datesInRange as $date) {

            $counter++;
            $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
            $dates2[$counter] = $dates1 = [$date->format('m/d'.'('.$week[$date->format('w')]).')'];
            $dates3[$counter] = $dates1 = [$date->format('m/d')];
           
        }
        //dd(count($dates3));
        $beginning_of_the_month = $dates3[0]; //月初を取得
        $end_of_month = $dates3[array_key_last($dates3)]; //月末を取得
        implode($beginning_of_the_month);
        implode($end_of_month);
        $string_beginning_of_the_month = implode(', ', $beginning_of_the_month);
        $string_end_of_month = implode(', ', $end_of_month);


           return view('Attendance_input', compact('dates2', 'year', 'month', 'from', 'to','string_beginning_of_the_month','string_end_of_month'));

        }
    }

