<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramNews extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'program_news';

    public $fillable = [
        'user_id',
        'program_id',
        'description'
    ];
}
