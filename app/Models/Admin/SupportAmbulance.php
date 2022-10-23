<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SupportAmbulance
 * @package App\Models\Admin
 * @version April 12, 2022, 12:21 pm WIB
 *
 * @property integer $user_id
 * @property integer $is_confirm
 */
class SupportAmbulance extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'support_ambulances';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'book_date',
        'reason',
        'is_confirm'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'book_date' => 'string',
        'reason' => 'string',
        'is_confirm' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'book_date' => 'required',
        'reason' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    
}
