<?php

// app/Models/Ad.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'position', 'title', 'image_url', 'start_time', 'end_time', 'status'];

    public function schedules()
    {
        return $this->hasMany(AdSchedule::class);
    }
}
