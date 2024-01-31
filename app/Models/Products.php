<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = ["name", "keyword","vehicle", "desc", "content",
    "price0","price1","price2","image","images","idcat","departureday","departurelocation","arrivallocation","status"];
    protected $primaryKey = "id";
    public $timestamps = false;

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'tour_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'idcat');
    }
    // public function calculatePrice($personType)
    // {
    //     $basePrice = $this->price;

    //     switch ($personType) {
    //         case 'price':
    //             return $basePrice;
    //         case 'price1':
    //             return $basePrice * ($this->adult_percentage / 100);
    //         case 'price2':
    //             return $basePrice * ($this->young_children_percentage / 100);
    //         default:
    //             return $basePrice;
    //     }
    // }
}

