<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "service";
    protected $fillable = [
        'name',
        'club_id',
        'user_id',
    ];
}
