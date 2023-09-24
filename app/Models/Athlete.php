<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $table = "athlete";
    protected $fillable = [
        'club_name',
        'school_name',
        'phone_no',
        'address',
        'city',
        'state',
        'zip_code',
        'user_id',
    ];
}
