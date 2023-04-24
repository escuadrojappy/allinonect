<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ModelDate;

class ForgotPassword extends Model
{
    use HasFactory, SoftDeletes, ModelDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token',
        'expires_at',
        'email',
    ];

    /**
     * Get User.
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
