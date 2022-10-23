<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Income
 * @package App\Models\Admin
 * @version February 24, 2022, 11:36 am WIB
 *
 * @property integer $user_id
 * @property string $name
 * @property string $precent
 */
class Income extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'incomes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'name',
        'precent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'precent' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'precent' => 'required'
    ];

    
}
