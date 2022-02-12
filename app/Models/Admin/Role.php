<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class About
 * @package App\Models\Admin
 * @version February 9, 2022, 7:23 am UTC
 *
 * @property string $name
 * @property string $guard_name
 */
class Role extends Model
{
    use HasFactory;

    public $table = 'roles';

    public $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
