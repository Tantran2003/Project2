<?php

namespace App\Http\Controllers\Interface;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use Illuminate\Support\Facades\Session;
use Auth;
class CheckoutController extends Controller
{
  
    public function booking($product_id, $schedule_id)
    {

        $data['checkout'] = DB::table('products')
            ->join('schedule', 'products.id', '=', 'schedule.tour_id')
            ->select('products.*', 'schedule.*')
            ->where('products.id', '=', $product_id)
            ->where('schedule.id', '=', $schedule_id)
            ->get();

        return view('interface/pages/checkout', $data);

    }





    public function save(Request $request)
    {
        //Check if the user is not logged in
        if (!Auth::check()) {
            $request->session()->put('failed_to_process', 'You must be logged in to proceed with the checkout.');
            return redirect()->route('gd.login'); // Redirect the user to the login page
        }

        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'person1' => 'required|numeric|min:1',
            'person2' => 'required|numeric|min:0',
            'person3' => 'required|numeric|min:0',
        ]);

        // Xử lý giá tiền
        $price1 = str_replace(['.', ' VNĐ'], '', $request->price1);
        $price2 = str_replace(['.', ' VNĐ'], '', $request->price2);
        $price3 = str_replace(['.', ' VNĐ'], '', $request->price3);
        $price0 = str_replace(['.', ' VNĐ'], '', $request->price0);

        // Chuyển đổi sang số
        $price1 = intval($price1);
        $price2 = intval($price2);
        $price3 = intval($price3);
        $price0 = intval($price0);

        // Tiếp tục tính toán tổng giá trị
        $total_price = ($request->person1 * $price1) + ($request->person2 * $price2) + ($request->person3 * $price3) + $price0;

        // Lưu dữ liệu người dùng và tổng giá trị vào session
        $request->session()->put('booking', [
            'user_id' => $request->user_id,
            'schedule_id' => $request->schedule_id,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'departurelocation' => $request->departurelocation,
            'arrivallocation' => $request->arrivallocation, 
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'vehicle' => $request->vehicle,
            'keyword' => $request->keyword,
            'tour_code' => $request->tour_code,
            'person1' => $request->person1,
            'person2' => $request->person2,
            'person3' => $request->person3,
            'price1' => $request->price1,
            'price2' => $request->price2,
            'price3' => $request->price3,
            'price0' => $request->price0,
            //    'total_price' => number_format($total_price, 0, ',', '.') . ' VNĐ',
            'total_price' => $total_price,
        
        ]);
        
            // dd($request->session()->get('booking'));
        return view('interface/pages/pay');
    }
}

//  
