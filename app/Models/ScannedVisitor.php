<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ModelDate;

class ScannedVisitor extends Model
{
    use HasFactory, ModelDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'visitor_id',
        'establishment_id',
        'entrance_timestamp',
    ];
}
