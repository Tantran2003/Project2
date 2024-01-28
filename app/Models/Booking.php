<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Guide;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        // 'package_name',
        // 'price',
        // 'date',
        // 'day',
        // 'package_id',
        // 'guide_id',
        // 'tourist_id',
        // 'is_completed',
        // 'approved_status',
        "order_id",	
"user_id",	
"schedule_id",	
"fullname",	
"email",	
"phone",	
"address",	
"departurelocation",	
"arrivallocation",	
"date_start",	
"date_end",	
"vehicle",	
"keyword",	
"tour_code",	
"person1",	
"person2",	
"person3",	
"price1",	
"price2",	
"price3",	
"price0",	
"total_price"
    ];
    protected $primarykey = "id";
    public $timestamps = false;
    protected $casts = [
        'approved_status' => 'boolean',
    ];
    public function tourist(){
        return $this->belongsTo(Account::class, 'tourist_id');
    }
    public function guide(){
        return $this->belongsTo(Guide::class, 'guide_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'package_id', 'id');
    } 
    public function Order_momo()
    {
        return $this->belongsTo(Order_momo::class);
    }
}