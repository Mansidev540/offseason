<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = "member";
    protected $fillable = [
        'user_id',
        'name',
        'phone_no',
        'address',
        'city',
        'state',
        'zip_code',
    ];
}
