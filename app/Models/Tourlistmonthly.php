<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourlistmonthly extends Model
{
    protected $table = "tourlistmonthly";
    protected $fillable = ["name", "keyword", "language", "level", "status"];
    protected $primarykey = "id";
    public $timestamps = false;
    public function tourDetail()
    {
        return $this->belongsTo(Tourdetailmonthly::class, 'tour_detail_id');
    }
}
