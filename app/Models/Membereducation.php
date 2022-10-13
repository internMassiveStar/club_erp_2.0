<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membereducation extends Model
{

    protected $fillable = [
        'member_id', 'degree', 
    ];
    use HasFactory;
}
