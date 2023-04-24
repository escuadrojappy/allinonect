<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use ModelDate;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ModelDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'email_verified_at',
        'is_password_changed',
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
     * Get Establishment.
     * 
     */
    public function establishment()
    {
        return $this->hasOne(Establishment::class);
    }

    /**
     * Get Establishment.
     * 
     */
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
     * Get Visitor.
     * 
     */
    public function visitor()
    {
        return $this->hasOne(Visitor::class);
    }

    /**
     * Get Role.
     * 
     */
    public function role()
    {
        return $this->hasMany(Role::class);
    }

    /**
     * Get forgot passwords.
     * 
     */
    public function forgotPassword()
    {
        return $this->hasMany(User::class);
    }
}
