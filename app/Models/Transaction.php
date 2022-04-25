<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'type',
        'type_id',
        'user_id',
        'name',
        'email',
        'phone',
        'message',
        'total_donate',
        'is_anonim',
        'is_confirm'
    ];
}
