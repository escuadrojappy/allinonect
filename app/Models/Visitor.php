<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
