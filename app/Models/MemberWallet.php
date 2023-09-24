<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberWallet extends Model
{
    use HasFactory;
    protected $table = "member_wallet";
    protected $fillable = [
        'member_id',
        'card_name',
        'card_no',
        'valid_date',
        'sec_code',
        'billing_zip_code',
    ];
}
