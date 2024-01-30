<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_momo extends Model
{
    protected $table = 'order_momo';
    protected $primaryKey = 'id';
    protected $fillable =['	partner_code','order_id','amount','order_info','created_at','updated_at'];
    public $timestamps = true;
    public function bookings()
    {
        return $this->belongsTo(Booking::class,'order_momo');
    }
}
