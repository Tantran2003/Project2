<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Guide;
use App\Http\Controllers\Controller;
use App\Notifications\PackageApproveConfirmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Models\Order_momo;
class AdminBookingController extends Controller
{
    public function pendingBookingList($id){
        $pendinglists = Booking::find($id);
        return view('admin.booking.pendinglist', compact('pendinglists'));
    }

    public function bookingApprove($id){
        $req = Booking::find($id);
        
        $req->save();

        $req->tourist->notify(new PackageApproveConfirmation($req));

        session()->flash('success', 'Booking Request Approved Successfully');
        return redirect()->back();
    }

    public function bookingRemoveByAdmin($id){

        $req = Booking::find($id);

        $guide = Guide::find($req->guide_id);
        $guide->status = 1;
        $guide->save();


        $req->delete();
        session()->flash('success', 'Booking Request Removed Successfully');
        return redirect()->back();
    }

    public function runningPackage(){
        $runningLists = Booking::where('approved_status', 'yes')->where('is_completed', 'no')->get();
        return view('admin.booking.runningPackage', compact('runningLists'));

    }

    public function runningPackageComplete($id){
       $req = Booking::find($id);

        $guide = Guide::find($req->guide_id);
        $guide->status = 1;
        $guide->save();

       $req->is_completed = "yes";
       $req->save();

       session()->flash('success', 'Tour Completed Successfully');
       return redirect()->back();
    }


public function tourhistory($id = null){
    $data["booking"] = Booking::where('id', '=', $id)->get();
    return view("admin/booking/historyList", $data);
}
public function ordermomo(){
    $data["booking"] = Order_momo::get();
    return view("admin/booking/ordermomo", $data);
}


public function deleteorder($id)
  {
    try {
      if (Booking::where('order_id', $id)->exists()) {

        toastr()->error('Vui lòng xóa hết lịch trình của chuyến tour này trước khi xóa tour');
        return redirect()->route('ht.ordermomo');
      }
     
      Order_momo::destroy($id);

      toastr()->success('Xóa thành công !');
      return redirect()->route('ht.ordermomo');
    } catch (\Throwable $th) {
      return redirect()->route('ht.ordermomo');
    }
}

  
}