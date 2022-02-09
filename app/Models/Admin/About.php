<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class About
 * @package App\Models\Admin
 * @version February 9, 2022, 7:23 am UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property integer $is_active
 */
class About extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'abouts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'description',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    
}
