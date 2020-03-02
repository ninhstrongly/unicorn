<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time_run_crontab extends Model
{
    protected $table = 'time_run_crontab';
    public $timestamps = false;
    public $fillable = ['name','time','status'];
}
