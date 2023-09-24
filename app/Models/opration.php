<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opration extends Model
{
    use HasFactory;
    protected $table = "opration";
    protected $fillable = [
        'club_id',
        'club_fee',
        'rate',
        'monday_status',
        'monday_open_time',
        'monday_close_time',
        'tuesday_status',
        'tuesday_open_time',
        'tuesday_close_time',
        'wednesday_status',
        'wednesday_open_time',
        'wednesday_close_time',
        'thursday_status',
        'thursday_open_time',
        'thursday_close_time',
        'friday_status',
        'friday_open_time',
        'friday_close_time',
        'saturday_status',
        'saturday_open_time',
        'saturday_close_time',
        'sunday_status'
    ];
}
