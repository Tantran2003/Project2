<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table = 'guides';
    protected $primaryKey = 'id';
    public $timestamps = false; // Since you don't want to use timestamps

    protected $fillable = ['nid', 'name', 'email', 'contact', 'address', 'image', 'status', 'created_at', 'updated_at'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
