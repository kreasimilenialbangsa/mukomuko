<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ZiswafCategory
 * @package App\Models\Admin
 * @version February 9, 2022, 5:37 pm UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 */
class ZiswafCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ziswaf_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
