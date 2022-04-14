<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SupportService
 * @package App\Models\Admin
 * @version April 12, 2022, 12:16 pm WIB
 *
 * @property integer $user_id
 * @property integer $category_id
 * @property string $reason
 * @property integer $nominal
 * @property integer $is_confirm
 */
class SupportService extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'support_services';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'category_id',
        'reason',
        'nominal',
        'is_confirm'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'reason' => 'string',
        'nominal' => 'integer',
        'is_confirm' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'reason' => 'required',
        'nominal' => 'required'
    ];

    
}
