<?php

// app/Models/AdSchedule.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['ad_id', 'time_slot', 'is_booked'];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}

