<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ModelDate;

class Establishment extends Model
{
    use HasFactory, SoftDeletes, ModelDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'contact_number',
        'status',
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
    public function scannedVisitor()
    {
        return $this->belongsToMany(Visitor::class, 'scanned_visitor');
    }
}
