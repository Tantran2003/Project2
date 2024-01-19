<?php  

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "participant";
    protected $fillable = [
        'booking_id',
        'name',
        'age',
        'phone',
    ];
    protected $primaryKey = "id"; // Corrected property name
    public $timestamps = false;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

