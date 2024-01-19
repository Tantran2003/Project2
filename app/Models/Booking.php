<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'packageID',
        'bookingdate',
        'adults',
        'children',
        'youngchildren',
        'babies',
        'specialrequests',
        'contactname',
        'contactemail',
        'contactphone',
        'paymentmethod',
        'totalcost',
    ];
    protected $primaryKey = 'book_id';
    public $timestamps = false;
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
