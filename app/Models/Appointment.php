<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'client_id',    
        'appointment_date',
        'reason',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
