<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

/**
 * Class Ziswaf
 * @package App\Models\Admin
 * @version February 9, 2022, 5:26 pm UTC
 *
 * @property integer $user_id
 * @property integer $category_id
 * @property string $title
 * @property integer $is_active
 */
class Ziswaf extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ziswafs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'category_id',
        'title',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'title' => 'string',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required',
        'title' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Admin\ZiswafCategory::class, 'category_id');
    }

    public function donate()
    {
        return $this->hasMany(\App\Models\Admin\Donate::class, 'type_id', 'id')->whereType('\App\Models\Admin\Ziswaf')->whereIsConfirm(1);
    }
}
