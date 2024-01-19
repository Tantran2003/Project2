<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    protected $table = "ratings";
    protected $fillable = ["product_id","user_id","username","email","comment","rating","status","created_at","updated_at"];
    protected $primarykey = "id";
    public $timestamps = true;
}
