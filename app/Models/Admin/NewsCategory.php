<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class NewsCategory
 * @package App\Models\Admin
 * @version February 9, 2022, 5:35 pm UTC
 *
 * @property integer $user_id
 * @property string $name
 * @property string $slug
 */
class NewsCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'news_categories';
    

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
