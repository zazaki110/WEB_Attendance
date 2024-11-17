<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('User_attendance', function (Blueprint $table) {
            $table->integer('User_id')->nullable(); ///ユーザーID　1
            $table->string('User_name')->nullable(); ///ユーザーネーム 2
            $table->string('date'); ///日付 3
            $table->string('Work_classification'); //出勤区分(例　出勤,欠勤など) 4
            $table->string('Start_time'); ///勤務開始時間 5
            $table->string('End_time'); ///勤務終了時間 6
            $table->string('Break_time'); ///休憩時間 7
            $table->integer('Overtime break')->nullable(); ///残業休憩 8
            $table->integer('Late_night_break')->nullable(); ///深夜休憩 9
            $table->string('Remarks_column')->nullable(); ///備考欄 10
            $table->integer('Actual_working_hours')->nullable(); ///実働時間　11
            $table->string('Authorizer')->nullable(); //承認者　12
            $table->integer('Authorizer_time')->nullable(); ///承認者の時間　13
            $table->timestamp('created_at')->useCurrent();//登録されたデータ日時　14
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User_attendance');
    }
};
