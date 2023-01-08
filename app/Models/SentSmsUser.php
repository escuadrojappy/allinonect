<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentSmsUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batch_no',
        'establishment_id',
        'visitor_id',
        'entrance_timestamp',
    ];

    /**
     * Get Scanned Visitors.
     * 
     */
    public function scannedVisitor()
    {
        return $this->belongsTo(ScannedVisitor::class);
    }
}
