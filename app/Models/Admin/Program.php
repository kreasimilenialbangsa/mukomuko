<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Program
 * @package App\Models\Admin
 * @version February 9, 2022, 5:23 pm UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 * @property string $location
 * @property integer $target_dana
 * @property string $end_date
 * @property integer $category_id
 * @property string $description
 * @property string $image
 * @property integer $is_urgent
 * @property integer $is_active
 */
class Program extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'programs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'slug',
        'location',
        'target_dana',
        'end_date',
        'category_id',
        'description',
        'image',
        'is_urgent',
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
        'slug' => 'string',
        'location' => 'string',
        'target_dana' => 'integer',
        'end_date' => 'string',
        'category_id' => 'integer',
        'description' => 'string',
        'image' => 'string',
        'is_urgent' => 'integer',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'location' => 'required',
        'target_dana' => 'required',
        'end_date' => 'required',
        'category_id' => 'required',
        'description' => 'required',
    ];

    public function category()
    {
        return $this->hasOne(\App\Models\Admin\ProgramCategory::class, 'id', 'category_id');
    }

    public function news()
    {
        return $this->hasMany(\App\Models\Admin\ProgramNews::class, 'program_id', 'id');
    }

    public function donate()
    {
        return $this->hasMany(\App\Models\Admin\Donate::class, 'type_id', 'id');
    }
}
