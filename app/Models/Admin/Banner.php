<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Banner
 * @package App\Models\Admin
 * @version February 9, 2022, 6:17 am UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $link_url
 * @property integer $is_active
 */
class Banner extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'banners';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'image',
        'description',
        'link_url',
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
        'image' => 'string',
        'description' => 'string',
        'link_url' => 'string',
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
