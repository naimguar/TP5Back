<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $fillable = [
        'client_id',    
        'appointment_date',
        'reason',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Cliente::class);
    }
}
