<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    public $fillable = [
        'penerima_manfaat',
        'penghimpunan',
        'penyaluran',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penerima_manfaat' => 'string',
        'penghimpunan' => 'string',
        'penyaluran' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penerima_manfaat' => 'required',
        'penghimpunan' => 'required',
        'penyaluran' => 'required',
    ];
}
