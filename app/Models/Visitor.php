<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ModelDate;

class Visitor extends Model
{
    use HasFactory, SoftDeletes, ModelDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'place_of_birth',
        'contact_number',
        'philsys_card_number',
    ];

    /**
     * Get User.
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Scanned Visitors.
     * 
     */
    public function scannedEstablishment()
    {
        return $this->belongsToMany(Establishment::class, 'scanned_visitor');
    }

    /**
     * Get Health Status.
     * 
     */
    public function healthStatus()
    {
        return $this->hasMany(VisitorHealthStatus::class);
    }
}
