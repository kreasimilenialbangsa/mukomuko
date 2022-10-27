<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Notification
 * @package App\Models\Admin
 * @version October 23, 2022, 5:41 pm WIB
 *
 * @property integer $user_id
 * @property string $title
 * @property string $body
 * @property string $image
 */
class Notification extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'notifications';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'body',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required'
    ];

    
}
