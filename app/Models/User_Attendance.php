<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Attendance extends Model
{
    use HasFactory;
    //public $timestamps = false; // タイムスタンプを無効にする
    protected $table = 'user_attendance';
    protected $attributes = [
        'User_id' => 0,
    ];
    protected $fillable = ['User_id','User_name', 'date','Work_classification','Start_time','End_time','Break_time','Overtime break','Late_night_break','Remarks_column','Actual_working_hours','Authorizer','Authorizer_time','created_at'];
}
