<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Donate
 * @package App\Models\Admin
 * @version February 15, 2022, 2:51 pm UTC
 *
 * @property integer $user_id
 * @property string $type
 * @property integer $type_id
 * @property integer $location_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $date_donate,
 * @property integer $total_donate
 * @property integer $is_anonim
 * @property integer $is_confir
 */
class Donate extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'donates';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'parent_user',
        'order_id',
        'order_token',
        'order_url',
        'type',
        'type_id',
        'location_id',
        'name',
        'email',
        'phone',
        'message',
        'total_donate',
        'date_donate',
        'is_anonim',
        'is_confirm',
        'is_payment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'parent_user' => 'integer',
        'order_id' => 'string',
        'order_token' => 'string',
        'order_url' => 'string',
        'type' => 'string',
        'type_id' => 'integer',
        'location_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'message' => 'string',
        'total_donate' => 'integer',
        'date_donate' => 'string',
        'is_anonim' => 'integer',
        'is_confirm' => 'integer',
        'is_payment' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function program()
    {
        return $this->belongsTo(\App\Models\Admin\Program::class, 'type_id');
    }

    public function ziswaf()
    {
        return $this->belongsTo(\App\Models\Admin\Ziswaf::class, 'type_id');
    }
    
    public function location()
    {
        return $this->belongsTo(\App\Models\Admin\Kecamatan::class, 'location_id')->with('desa');
    }

    public function desa()
    {
        return $this->belongsTo(\App\Models\Admin\Desa::class, 'location_id');
    }
    
}
