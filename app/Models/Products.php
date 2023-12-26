<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $fillable = ["name", "keyword", "desc", "content","price","image","images","idcat","departureday","departurelocation","status"];
    protected $primarykey = "id";
    public $timestamps = false;
}
