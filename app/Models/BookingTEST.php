<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Guide;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'sche_id',
        'guide_id',
        'tourist_id',
        'user_name',
        'package_id',
        'tour_code',
        'package_name',
        'duration',
        'payment',
        'price',
        'date_book',
        'date_start',
        'is_completed',
        'status'
    ];
    protected $primaryKey = "book_id";
    public $timestamps = false;
    protected $casts = [
        'status' => 'boolean',
    ];
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