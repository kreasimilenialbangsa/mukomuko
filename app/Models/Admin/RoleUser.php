<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class About
 * @package App\Models\Admin
 * @version February 9, 2022, 7:23 am UTC
 *
 * @property integer $role_id
 * @property integer $model_id
 */
class RoleUser extends Model
{
    use HasFactory;

    public $table = 'model_has_roles';

    public $fillable = [
        'role_id',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'model_id' => 'integer'
    ];

    public function role() {
        return $this->hasOne(\App\Models\Admin\Role::class, 'id', 'role_id');
    }
}
