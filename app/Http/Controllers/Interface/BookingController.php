<?php

namespace App\Http\Controllers\Interface;

use App\Models\Booking;
use App\Models\Guide;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function tourHistory()
    {
        $historyList = Booking::where('approved_status', 'yes')
            ->join('account', 'bookings.tourist_id', '=', 'account.id')
            ->where('tourist_id', Auth::id())
            ->get();

        $currentDate = Carbon::now()->format('F d, Y');
        return view('interface.booking.historyList', compact('historyList', 'currentDate'));
    }




    // public function pendingBookingList(){
    //     $pendinglists = Booking::where('approved_status', 'yes')
    //         ->join('account', 'bookings.tourist_id', '=', 'account.id')
    //         ->where('tourist_id', Auth::id())
    //         ->get();

    //     return view('interface.booking.pendinglist', compact('pendinglists'));
    // }
    public function pendingBookingList()
    {
        $pendinglists = Booking::where('approved_status', 'yes')
            ->join('account', 'bookings.tourist_id', '=', 'account.id')
            ->join('products', 'bookings.package_id', '=', 'products.id')
            ->join('schedule', 'bookings.sche_id', '=', 'schedule.id')
            ->where('tourist_id', Auth::id())
            ->select(
                'bookings.*',
                'account.fullname',
                'account.phone',
                'products.keyword as day',
                'schedule.date_start as departure_date'
            )
            ->get();

        return view('interface.booking.pendinglist', compact('pendinglists'));
    }





    public function cancelBookingRequest($id)
    {
        $req = Booking::find($id);

        $guide = Guide::find($req->guide_id);
        $guide->status = 1;
        $guide->save();

        $req->delete();
        session()->flash('success', 'Booking Request Canceled Successfully');
        return redirect()->back();
    }
}
