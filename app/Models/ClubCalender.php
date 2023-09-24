<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubCalender extends Model
{
    protected $table = "club_calender";
    protected $fillable = [
        'user_id',
        'club_id',
        'date',
        'time',
        'member_id',
        'roster_id',
        'service_id',
        'rental_id',
        'duration',
        'trainer_rate',
        'total',
    ];
}
