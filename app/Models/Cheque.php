<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id', 'ad_rcs','receiving_amount', 'type', 'cheque_no'
    ];
}
