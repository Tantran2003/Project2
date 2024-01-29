<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedule";
    protected $fillable = ["tour_id", "date_start", "date_end", "tour_code"];
    protected $primarykey = "id";
    public $timestamps = false;
    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
    ];
    public function product()
    {
        return $this->belongsTo(Products::class, 'tour_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'sche_id', 'id');
    }
}

