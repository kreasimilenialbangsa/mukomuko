<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SupportServiceCategory
 * @package App\Models\Admin
 * @version April 12, 2022, 12:23 pm WIB
 *
 * @property integer $user_id
 * @property string $name
 * @property string $slug
 */
class SupportServiceCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'support_service_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
