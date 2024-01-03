<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourdetailmonthly extends Model
{
    protected $table = "tourdetailmonthly";
    protected $fillable = ["datefrom", "dateto", "desc","image", "level", "status"];
    protected $primarykey = "id";
    public $timestamps = false;
    public function selectedDates()
    {
        return $this->hasMany(Tourselectdate::class, 'tour_detail_id');
    }
}
