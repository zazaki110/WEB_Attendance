const { normalizePath } = require("vite");


function init() {
    console.log("ページが読み込まれました。");
    // ここで初期化処理や他の関数を呼び出す
    year_get();  // 例: 年のセレクトボックスのデータを取得する関数
    month_get(); // 例: 月のセレクトボックスのデータを取得する関数
}



function year_get() {
    console.log("js読み込み成功");
    var year1 = document.getElementById("year_select_get_js").value;
    console.log(year1);
    var year2 =  document.getElementById("year_input").value=year1;
     console.log(year2);
}

function month_get() {

    var month1 = document.getElementById("month_select").value;
    console.log(month1);
    var month2 =  document.getElementById("month_input").value=month1;
     console.log(month2);

}

function workcheck(element){


    var listValue = element.getAttribute("list");  // list属性の値を取得
     console.log(listValue);
     var listValue_names = element.getAttribute("list");  // list属性の値を取得しnameタグ用にインクリメントする
     listValue_names++;

     ///現在のフォーカスを取得
    var focuscheck = document.activeElement;

     //出勤区分を取得
     var  Attendance_classification = document.getElementById("attendance_at_work"+listValue_names).value;
     console.log(Attendance_classification+"区分です");
     if(Attendance_classification=="入力なし"){
          focuscheck.blur();
          alert('出勤区分を選択してください')
     }

     Break_time(element);


}



function start_time_get(element) {

     
 // name属性の値を取得
     var str1_nameValue = element.name;
     var str2_nameValue = element.name;



     var listValue = element.getAttribute("list");  // list属性の値を取得
     console.log(listValue);
     var listValue_names = element.getAttribute("list");  // list属性の値を取得しnameタグ用にインクリメントする
     listValue_names++;


     var strname1 = document.getElementsByName("start_time1"+listValue_names);///任意のnameタグを取得
     var str1names1= strname1[0].value;///nameの値を取得
     console.log(str1names1);
     

     var strname2 = document.getElementsByName("start_time2"+listValue_names);///任意のnameタグを取得
     var str2names2= strname2[0].value;///nameの値を取得
     console.log(str2names2);


     var endname1 = document.getElementsByName("end_time1"+listValue_names);///任意のnameタグを取得
     var end1names1= endname1[0].value;///nameの値を取得
     console.log(end1names1);

     var endname2 = document.getElementsByName("end_time2"+listValue_names);///任意のnameタグを取得
     var end2names2= endname2[0].value;///nameの値を取得
     console.log(end2names2);



     if(end2names2 !== null && str1names1 !== "" && 
          str2names2 !== null && str2names2 !== "" && 
          end1names1 !== null && end1names1 !== "" && 
          end2names2 !== null && end2names2 !== ""){

          var now1 = new Date();
          //now1.setHours(end2names2);  // 現在の時間
          now1.setHours(str1names1);  // 現在の時間
          now1.setMinutes(str2names2);  // 現在の分
          now1.setSeconds(0);           // 現在の秒
          console.log(now1.getTime());

          var now2 = new Date();
          now2.setHours(end1names1);    
          now2.setMinutes(end2names2);  
          console.log(now2.getTime());
          var diff = now2.getTime() - now1.getTime();//勤務時間終了時-勤務時間開始時
          console.log(diff);
          console.log("Milliseconds difference: " + diff);

          // ミリ秒を時間、分、秒に変換
          var milliseconds = diff % 1000;
          var seconds = Math.floor((diff / 1000) % 60);
          var minutes = Math.floor((diff / (1000 * 60)) % 60);//分
          var hours = Math.floor((diff / (1000 * 60 * 60)) % 24);//時間
          
          // 2桁表示にするためのゼロ埋め
          hours = (hours < 10) ? "0" + hours : hours;
          minutes = (minutes < 10) ? "0" + minutes : minutes;
          //seconds = (seconds < 10) ? "0" + seconds : seconds;
          
          var formattedTime = hours + ":" + minutes;
          console.log("Formatted Time: " + formattedTime); // 例: "02:30:00"

          //var zitudou_hours=   document.getElementsByName("actual_working_hours1"+listValue_names);
           //zitudou_hours[0].value = hours;

           //var zitudou_miutes=   document.getElementsByName("actual_working_hours2"+listValue_names);
           //zitudou_miutes[0].value = minutes;
          //document.getElementById("actual_working_hours1").value=hours;
          Break_time(element);
     }

 }

 function Break_time(element) {
     console.log("休憩時間計算開始");
 
     // list属性の値を取得
     var listValue = element.getAttribute("list");
     var listValue_names = parseInt(listValue) + 1; // インクリメント
 
     // 各時間入力の値を取得
     var break_time = document.getElementsByName("break_time" + listValue_names)[0].value; // 休憩時間
     var str1names1 = document.getElementsByName("start_time1" + listValue_names)[0].value; // 勤務開始時間(時)
     var str2names2 = document.getElementsByName("start_time2" + listValue_names)[0].value; // 勤務開始時間(分)
     var end1names1 = document.getElementsByName("end_time1" + listValue_names)[0].value;   // 勤務終了時間(時)
     var end2names2 = document.getElementsByName("end_time2" + listValue_names)[0].value;   // 勤務終了時間(分)
 
     // 勤務時間がすべて入力されているか確認
     if (str1names1 !== "" && str2names2 !== "" && end1names1 !== "" && end2names2 !== "") {
         
         // 勤務開始時間
         var start = new Date();
         start.setHours(str1names1);// 勤務開始時間(時)
         start.setMinutes(str2names2);// 勤務開始時間(分)
         start.setSeconds(0);
 
         // 勤務終了時間
         var end = new Date();
         end.setHours(end1names1);// 勤務終了時間(時)
         end.setMinutes(end2names2);// 勤務終了時間(分)
         end.setSeconds(0);
 
         // 終了時間が開始時間より前にならないようにチェック
         if (end.getTime() <= start.getTime()) {
             console.log("終了時間は開始時間より後に設定してください。");
             return;
         }
 
         // 勤務時間の差（ミリ秒）
         var diff = end.getTime() - start.getTime();
         console.log("勤務時間のミリ秒: " + diff);
 
         // 休憩時間が「分」として入力されていると仮定し、ミリ秒に変換
         var breakMilliseconds = break_time * 60 * 1000; // 休憩時間(分) -> ミリ秒
         console.log("休憩時間のミリ秒: " + breakMilliseconds);
 
         // 休憩時間を差し引く。差がマイナスになる場合は0にする
         var actualWorkingTime = Math.max(diff - breakMilliseconds, 0);
         console.log("休憩時間差し引いた勤務時間 (ミリ秒): " + actualWorkingTime);
 
         // ミリ秒を時間、分に変換
         var hours = Math.floor((actualWorkingTime / (1000 * 60 * 60)) % 24);
         var minutes = Math.floor((actualWorkingTime / (1000 * 60)) % 60);
 
         // ゼロ埋めで2桁表示
         hours = (hours < 10) ? "0" + hours : hours;
         minutes = (minutes < 10) ? "0" + minutes : minutes;
 
         // フォーマットされた時間を表示
         var formattedTime = hours + ":" + minutes;
         console.log("実働時間: " + formattedTime);
 
         // 実働時間の表示
         var actual_hours = document.getElementsByName("actual_working_hours1" + listValue_names);
         actual_hours[0].value = hours;
 
         var actual_minutes = document.getElementsByName("actual_working_hours2" + listValue_names);
         actual_minutes[0].value = minutes;
     } else {
         console.log("勤務開始時間、終了時間が正しく入力されていません。");
     }
 }


document.addEventListener('DOMContentLoaded', function() { //ページが読み込まれたら
     console.log("HTMLの読み込みが完了")
     console.log("js読み込み成功");
    var year1 = document.getElementById("year_select_get_js").value;
    console.log(year1);
    var year2 =  document.getElementById("year_input").value=year1;
     console.log(year2);

     var month1 = document.getElementById("month_select").value;
    console.log(month1);
    var month2 =  document.getElementById("month_input").value=month1;
     console.log(month2);
    });

    