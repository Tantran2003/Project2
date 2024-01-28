<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Guide;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'tourist_id',
        'user_name',
        'package_id',
        'duration',
        'tour_code',
        'package_name',
        'payment',
        'price',
        'date_book',
        'status'
    ];
    protected $primaryKey = "order_id";
    public $timestamps = false;
   
    public function account(){
        return $this->belongsTo(Account::class, 'tourist_id','id');
    }
    public function guide(){
        return $this->belongsTo(Guide::class, 'guide_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'package_id', 'id');
    } 
    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'sche_id', 'id');
    } 
    
}