<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'notes',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
