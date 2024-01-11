<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Schedule;

class UserTourController extends Controller
{

    
    public function index(Request $request){
        $data = Schedule::where('schedule_id',$request->scheid)->first();
        return view('interface.pages.checkout')->with('data',$data);
    }

    public function paymentPost(Request $request){
        $data = Schedule::where('schedule_id', $request->schedule_id)->get();
        $person1 = $request->person1;
        $person2 = $request->person2;
        $person3 = $request->person3;
        $person4 = $request->person4;

        $price = $request->price;
        $price1 = $request->price1;
        $price2 = $request->price2;
        $price3 = $request->price3;

        $amount = ($person1 * $price) + ($person2 * $price1)
        + ($person3 * $price2) + ($person4 * $price3);

        $current = new Carbon(); //nó sẽ tạo một đối tượng Carbon mới đại diện cho thời gian hiện tại theo múi giờ hệ thống máy chủ.
        
        $order = new Booking();
        $order->user_name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->payment = $request->payment;
        $order->person1 = $person1;
        $order->person2 = $person2;
        $order->person3 = $person3;
        $order->person4 = $person4;
        $order->amount = $amount;
        $order->schedule_id = $request->schedule_id;
        $order->date_book = $current->toDateTimeString();
        $order->location_start = $request->location_start;
        $order->date_start = $request->date_start;
        $order->date_end = $request->date_end;
        $order->transport = $request->transport;
        $order->duration = $request->duration;
        $order->status = 0;
        $order->tour_code = $request->tour_code;
        $order->user_id = $request->user_id;
        $order->tour_name = $request->tour_name;

        $order->save();

        $passenger = $person1 + $person2 + $person3 + $person4;
        return view ("interface/pages/checkout",
        ['passenger'=>$passenger,'person1'=>$person1,'person2'=>$person2,'person3'=>$person3,'person4'=>$person4,'price'=>$price,'price1'=>$price1,'price2'=>$price2,'price3'=>$price3,'amount'=>$amount,'name'=>$request->name,'data'=>$data]);
    }
}

