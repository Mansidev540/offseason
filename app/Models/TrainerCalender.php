<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerCalender extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "trainer_calender";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'club_calender_id',
        'net',
    ];
}
