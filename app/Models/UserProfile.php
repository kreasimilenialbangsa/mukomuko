<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    public $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'nik',
        'kk',
        'image',
        'telp',
        'birth_day',
        'birth_place',
        'address',
        'bio'
    ];
}
