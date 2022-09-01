<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class News
 * @package App\Models\Admin
 * @version February 9, 2022, 7:04 am UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property integer $category_id
 * @property integer $is_active
 * @property integer $is_highlight
 */
class News extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'category_id',
        'is_active',
        'is_highlight',
        'date_news'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'category_id' => 'integer',
        'is_active' => 'integer',
        'is_highlight' => 'integer',
        'date_news' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'date_news' => 'required'
    ];

    public function images()
    {
        return $this->hasMany(\App\Models\Admin\NewsImage::class, 'news_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(\App\Models\Admin\NewsCategory::class, 'id', 'category_id');
    }

    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }
    
}
