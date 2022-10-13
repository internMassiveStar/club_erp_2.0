<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Adoperation extends Model
{
    use HasFactory,Notifiable;
    protected $fillable = [
        'member_id', 'receiving_amount', 'receiving_tool'
    ];
    protected $hidden = [
    'remember_token'
    ];
}
