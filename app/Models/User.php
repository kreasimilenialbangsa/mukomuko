<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location_id',
        'is_active',
        'is_member'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role_user() {
        return $this->hasOne(\App\Models\Admin\RoleUser::class, 'model_id', 'id')->with('role');
    }

    public function role() {
        return $this->hasOne(\App\Models\Admin\Role::class, 'id');
    }

    public function profile()
    {
        return $this->hasOne(\App\Models\UserProfile::class, 'user_id', 'id');
    }

    public function desa()
    {
        return $this->belongsTo(\App\Models\Admin\Desa::class, 'location_id')->with('kecamatan');
    }

    public function donate()
    {
        return $this->hasMany(\App\Models\Admin\Donate::class, 'user_id', 'id')->whereType('\App\Models\Admin\Ziswaf');
    }
}
