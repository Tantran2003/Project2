<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = ["name", "image", "keyword", "desc", "level", "status"];
    protected $primarykey = "id";
    public $timestamps = false;
}
