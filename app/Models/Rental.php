<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = "rental";
    protected $fillable = [
        'name',
        'image',
        'price',
        'image',
        'club_id',
        'user_id',
    ];
}
