<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedule";
    protected $fillable = ["tour_id", "date_start", "date_end", "tour_code"];
    protected $primaryKey = "id";
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Products::class, 'tour_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'schedule_id', 'id');
    }
}

