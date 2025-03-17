<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'name', 'topic', 'duration', 'status', 'start_time',
    ];
}
