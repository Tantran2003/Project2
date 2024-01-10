<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = ["name", "keyword","vehicle", "desc", "content","price","price1","price2","price3","image","images","idcat","departureday","departurelocation","arrivallocation","status"];
    protected $casts = [
        'departuredate' => 'datetime',
    ];
    protected $primarykey = "id";
    public $timestamps = false;
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'tour_id', 'id');
    }
}
