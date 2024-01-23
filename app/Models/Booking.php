<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Guide;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'package_name',
        'price',
        'date',
        'day',
        'package_id',
        'guide_id',
        'tourist_id',
        'is_completed',
        'approved_status',
    ];
    protected $primarykey = "id";
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
}