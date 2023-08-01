<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Outcome
 * @package App\Models\Admin
 * @version April 14, 2022, 1:09 pm WIB
 *
 * @property integer $user_id
 * @property integer $desa_id
 * @property integer $perolehan_id
 * @property integer $category_id
 * @property string $description
 * @property integer $nominal
 */
class Outcome extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'outcomes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'desa_id',
        'perolehan_id',
        'category_id',
        'description',
        'nominal',
        'date_outcome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'desa_id' => 'integer',
        'perolehan_id' => 'integer',
        'category_id' => 'integer',
        'description' => 'string',
        'nominal' => 'integer',
        'date_outcome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Admin\OutcomeCategory::class, 'category_id');
    }

    public function desa()
    {
        return $this->belongsTo(\App\Models\Admin\Desa::class, 'desa_id');
    }

    public function income()
    {
        return $this->belongsTo(\App\Models\Admin\Income::class, 'perolehan_id');
    }

    
}
