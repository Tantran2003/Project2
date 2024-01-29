<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_vnpay extends Model
{
    protected $table = 'order_vnpay';
    protected $primaryKey = 'id';
    protected $fillable =['user_id','partner_code','order_id','amount','order_info','created_at','updated_at'];
    public $timestamps = true;
    public function bookings_vnpay()
    {
        return $this->belongsTo(Booking::class);
    }
}
