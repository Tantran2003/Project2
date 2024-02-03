<?php

namespace App\Http\Controllers\Interface;

use App\Models\Booking;
use App\Models\Account;
use App\Models\Products;
use App\Models\Schedule;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class BookingController extends Controller
{
    public function booking()
    {

        return view("interface/pages/booking,'productId' , 'scheduleId'");
    }
    public function addbooking(Request $request, $id = null)
    {
        //     $guides = Guide::where('status', 1)->get();
        //     $product = Products::find($product_id);
        //     if (!$product) {
        //         return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
        //     }
        //     $schedule = Schedule::find($schedule_id);
        //     if (!$schedule) {
        //         return redirect()->back()->with('error', 'Không tìm thấy lịch trình.');
        //     }
        //     return view('interface/pages/bookingform', compact('guides', 'product', 'schedule'));
        // }{
        if ($request->isMethod('post')) {
            $id = $request->id;
            $product = Products::find((int) $request->id);
            if ($product) {
                $amount = $request->amount;
                $amount1 = $request->amount1;
                $amount2 = $request->amount2;
                if (!$amount) {
                    $amount = 1;
                }
                if (!$amount1) {
                    $amount1 = 0;
                }
                if (!$amount2) {
                    $amount2 = 0;
                }
                // if($product){
                // $amount = isset($request->amount) && $request->amount ? $request->amount : 1;
                $item = array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'price1' => $product->price,
                    'price2' => $product->price,
                    'amount' => $amount,
                    'amount1' => $amount1,
                    'amount2' => $amount2
                );
                // Session()->put('cart.'.$product->id, $item);
                $cart = Session::put('booking.' . $product->id, $item);
                return response()->json('booking-success');
            }
        }
        return response()->json('booking-failure');
    }
    


//     public function storebookingtour(Request $request, $id){
//         //dd($request->all());
//         if($request->isMethod('post')){
//             //tính tong tien
//             $giatien=0;
//             foreach (Session::get('cart') as  $value) {
//                 $giatien=$giatien+$value['price']*$value['amount'];
//             }
//         $this->validate($request, [
//             'guide' => 'required',
//             'date' => 'required',
//             'schedule' => 'required'
//         ]);
    


//         $guide_id = $request->guide;
        
//         $date = $request->date;
//         $package_id = $request->package_id;
//         $package_name = $request->package_name;
//         $package_price = $request->package_price;
//         $day = $request->keyword;
//         $schedule = $request->schedule;

//         $book = new Booking();
//         $book->approved_status = false; 
//         $book->package_name = $package_name;
//         $book->price = $package_price;
//         $book->date = $date;
//         $book->package_id = $package_id;
//         $book->guide_id = $guide_id;
//         $book->sche_id = $schedule;
//         $book->day = $day;
//         $book->tourist_id = Auth::id();
//         $book->save();
        
//         $guide = Guide::find($guide_id);
//         $guide->status = 0;
//         $guide->save();
//         foreach (Session::get('cart') as $key => $value) {
//             $ctdh=new Orderdetail();
//             $ctdh->quantity=(int)$value['amount'];
//             $ctdh->id_order=(int)$order->id;
//             $ctdh->id_product=(int)$value['id'];
//             $ctdh->status=1;
//             $ctdh->save();
//         }
//         Session::forget('cart');
//         // session()->flash('success', 'Your Booking Request Send Successfully, Please wait for admin approval');
//         return redirect(route('gd.checkout'));
//     }
// }
    public function checkout(Request $request)
    {
        if ($request->isMethod('post')) {
            //tính tong tien
            $giatien = 0;
            foreach (Session::get('booking') as $value) {
                $giatien = $giatien + $value['price'] * $value['amount'];
            }
            $order = new Order();
            $order->id_user = Auth::user()->id;
            $order->ship = 10;
            $order->total = $giatien;
            $order->payment = $request->payment;
            $order->timeship = 7;
            $order->note = "";
            $order->date_order = date('d/m/Y', strtotime(date('Y-m-d H:i:s')));
            $order->status_order = 1;
            $order->save();
            foreach (Session::get('booking') as $key => $value) {
                $ctdh = new Booking();
                $ctdh->quantity = (int) $value['amount'];
                $ctdh->id_order = (int) $order->id;
                $ctdh->id_product = (int) $value['id'];
                $ctdh->status = 1;
                $ctdh->save();
            }
            Session::forget('cart');
            return redirect()->route('gd.home');
        }
        return view("giaodien/pages/checkout");
    }
        
        
    }


    // public function getGuides(){
    //     $guides = Guide::latest()->paginate(8);
    //     $guideCount = Guide::all()->count();
    //     // Share the $guides variable with all views
    //     // view()->share('guides', $guides);
    //     return response()->view('interface.guide.index',compact( 'guideCount','guides'));

    // }

    // public function getGuideDetails($id){
    //     $guide = Guide::find($id);
    //     return response()->view('interface.guide.show',compact('guide'));
    // }
    // public function tourHistory()
    // {
    //     $historyList = Booking::where('bookings.status', 1)
    //         ->join('account', 'bookings.tourist_id', '=', 'account.id')
    //         ->where('tourist_id', Auth::id())
    //         ->get();

    //     $currentDate = Carbon::now()->format('F d, Y');
    //     return view('interface.booking.historyList', compact('historyList', 'currentDate'));
    // }




    // public function pendingBookingList(){
    //     $pendinglists = Booking::where('approved_status', 0)
    //         ->join('account', 'bookings.tourist_id', '=', 'account.id')
    //         ->where('tourist_id', Auth::id())
    //         ->get();

    //     return view('interface.booking.bookingform', compact('pendinglists'));
    // }
    // public function pendingBookingList()
    // {
    //     $pendinglists = Booking::where('bookings.status', 0)
    //         ->join('account', 'bookings.tourist_id', '=', 'account.id')
    //         ->join('products', 'bookings.package_id', '=', 'products.id')
    //         ->join('schedule', 'bookings.sche_id', '=', 'schedule.id')
    //         ->where('tourist_id', Auth::id())
    //         ->select(
    //             'bookings.*',
    //             'account.fullname as tourist_name',
    //             'account.phone as tourist_phone',
    //             'products.keyword as day',
    //             'schedule.date_start as departure_date'
    //         )
    //         ->get();

    //     return view('interface.booking.bookingform', compact('pendinglists'));
    // }




    // public function cancelBookingRequest($id)
    // {
    //     $req = Booking::find($id);

    //     $guide = Guide::find($req->guide_id);
    //     $guide->status = 1;
    //     $guide->save();

    //     $req->delete();
    //     session()->flash('success', 'Booking Request Canceled Successfully');
    //     return redirect()->back();
    // }

