<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Kecamatan
 * @package App\Models\Admin
 * @version February 12, 2022, 9:14 am UTC
 *
 * @property integer $user_id
 * @property integer $parent_id
 * @property string $name
 * @property integer $is_active
 */
class Kecamatan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'locations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'parent_id',
        'name',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'parent_id' => 'integer',
        'name' => 'string',
        'is_active' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function desa()
    {
        return $this->hasOne(\App\Models\Admin\Desa::class, 'id', 'parent_id');
    }

    public function donate()
    {
        return $this->hasMany(\App\Models\Admin\Donate::class, 'location_id', 'id')->whereType('\App\Models\Admin\Ziswaf')->with('location');
    }
}
