<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $table = "club";
    protected $fillable = [
        'club_name',
        'phone_no',
        'address',
        'city',
        'state',
        'zip_code',
        'user_id',
    ];
}
