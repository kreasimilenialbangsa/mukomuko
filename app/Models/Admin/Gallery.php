<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Gallery
 * @package App\Models\Admin
 * @version February 9, 2022, 6:57 am UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $link_url
 * @property string $image
 * @property string $video
 * @property integer $is_active
 */
class Gallery extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'galleries';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'description',
        'link_url',
        'image',
        'video',
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
        'link_url' => 'string',
        'image' => 'string',
        'video' => 'string',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'required',
        'video' => 'required'
    ];

    
}
