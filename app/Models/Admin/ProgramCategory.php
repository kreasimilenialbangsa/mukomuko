<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProgramCategory
 * @package App\Models\Admin
 * @version February 9, 2022, 5:36 pm UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 */
class ProgramCategory extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'program_categories';
    

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
