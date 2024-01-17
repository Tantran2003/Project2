<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;

class UserTourController extends Controller
{


    public function index($product_id, $schedule_id)
    {
        $data['checkout'] = DB::table('products')
            ->join('schedule', 'products.id', '=', 'schedule.tour_id')
            ->select('products.*', 'schedule.*')
            ->where('products.id', '=', $product_id)
            ->where('schedule.id', '=', $schedule_id)
            ->get();

        return view('interface.pages.checkout', $data);
    }

    // public function paymentPost(Request $request,Schedule $schedule){
    //     $data = $schedule->with('product')->find($request->id);
    //     // Make sure the schedule data is available
    //     if (!$data) {
    //         // Handle the case where the schedule data is not found
    //         return redirect()->back()->with('error', 'Schedule not found.');
    //     }
    //     $productData = $data->product;
    //     $person1 = $request->person1;
    //     $person2 = $request->person2;
    //     $person3 = $request->person3;
    //     $person4 = $request->person4;

    //     $price = $request->price;
    //     $price1 = $request->price1;
    //     $price2 = $request->price2;
    //     $price3 = $request->price3;

    //     $amount = ($person1 * $price) + ($person2 * $price1)
    //     + ($person3 * $price2) + ($person4 * $price3);

    //     $current = new Carbon(); //nó sẽ tạo một đối tượng Carbon mới đại diện cho thời gian hiện tại theo múi giờ hệ thống máy chủ.

    //     $order = new Booking();
    //     $order->user_name = $request->name;
    //     $order->email = $request->email;
    //     $order->address = $request->address;
    //     $order->phone = $request->phone;
    //     $order->payment = $request->payment;
    //     $order->person1 = $person1;
    //     $order->person2 = $person2;
    //     $order->person3 = $person3;
    //     $order->person4 = $person4;
    //     $order->amount = $amount;
    //     $order->schedule_id = $data->id;
    //     $order->date_book = $current->toDateTimeString();
    //     $order->location_start = $request->location_start;
    //     $order->date_start = $request->date_start;
    //     $order->date_end = $request->date_end;
    //     $order->vehicle = $request->vehicle;
    //     $order->duration = $request->duration;
    //     $order->status = 0;
    //     $order->tour_code = $request->tour_code;
    //     $order->user_id = $request->user_id;
    //     $order->tour_name = $request->tour_name;

    //     $order->save();

    //     $passenger = $person1 + $person2 + $person3 + $person4;
    //     return view ("interface.checkout",
    //     ['passenger'=>$passenger,'person1'=>$person1,'person2'=>$person2,'person3'=>$person3,'person4'=>$person4,'price'=>$price,'price1'=>$price1,'price2'=>$price2,'price3'=>$price3,'amount'=>$amount,'name'=>$request->name,'data'=>$data]);
    // }



    public function paymentPost(Request $request, Schedule $schedule)
    {
        $data = $schedule->with('product')->find($request->id);
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            // Add more rules as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Calculate the total amount
        $price = $request->price;
        $price1 = $request->price1;
        $price2 = $request->price2;
        $price3 = $request->price3;

        $amount = ($request->person1 * $price) + ($request->person2 * $price1) +
            ($request->person3 * $price2) + ($request->person4 * $price3);

        // Create a new Booking instance
        $order = new Booking();
        $order->user_name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->payment = $request->payment;
        $order->person1 = $request->person1;
        $order->person2 = $request->person2;
        $order->person3 = $request->person3;
        $order->person4 = $request->person4;
        $order->amount = $amount;

        // Load the related Schedule and Product data
        $order->schedule_id = $request->schedule_id;
        $order->load(['schedule.product']);

        $current = now();
        $order->date_book = $current->toDateTimeString();
        $order->location_start = $request->departurelocation;
        $order->date_start = $request->date_start;
        $order->date_end = $request->date_end;
        $order->vehicle = $request->vehicle;
        $order->duration = $request->keyword;
        $order->status = 0;
        $order->tour_code = $request->tour_code;
        $order->user_id = $request->user_id;

        // Set 'tour_name' based on the Product data
        $order->tour_name = $data->product->name;

        // ... (other fields)

        // Save the order to the database
        // Save the order to the database
        if ($order->save()) {
            // Retrieve the key of the saved order
            $key = $order->id;

            // Redirect to the checkout route
            return redirect()->route('gd.checkout', [
                'key' => $key,
                'passenger' => $request->person1 + $request->person2 + $request->person3 + $request->person4,
                'person1' => $request->person1,
                'person2' => $request->person2,
                'person3' => $request->person3,
                'person4' => $request->person4,
                'price' => $price,
                'price1' => $price1,
                'price2' => $price2,
                'price3' => $price3,
                'amount' => $amount,
                'name' => $request->name,
                'data' => $schedule->with('product')->find($request->id),
            ]);
        } else {
            // Handle the case where the order couldn't be saved
            return redirect()->back()->with('error', 'Failed to process the order. Please try again.');
        }

    }
}



