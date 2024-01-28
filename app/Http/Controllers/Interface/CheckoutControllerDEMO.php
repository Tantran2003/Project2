<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use Session;
use DB;
class CheckoutController extends Controller
{
        public function updateTotalAmountSession(Request $request)
        {
            // Validate the request if necessary
            $request->validate([
                'totalAmount' => 'required|numeric',
            ]);

            // Update the session with the total amount
            session(['totalAmount' => $request->totalAmount]);

            return response()->json(['message' => 'Total amount updated successfully']);
        }
        public function vnpay_payment(Request $request)
        {
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            $vnp_TmnCode = "OB1XYIE4"; //Mã website tại VNPAY 
            $vnp_HashSecret = "HLDJBDGWMOSVOWBNQLMAJVWTSWUPQXGS"; //Chuỗi bí mật

            $vnp_TxnRef = 'FPTour'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Receipt";
            $vnp_OrderType = "Travel Tour";
            $vnp_Amount = 10000 * 100;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NBC";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            ];

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = http_build_query($inputData);

            $vnp_Url = $vnp_Url . "?" . $query;

            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
                $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
            }

            $returnData = [
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
            ];
            
            if ($request->has('redirect')) {
                $booking = new Booking();
                $booking->tourist_id = $request->input('tourist_id');
                $booking->package_id = $request->input('tour_code'); // Assuming this should be package_id
                $booking->approved_status = 1;
                $booking->date_book = now(); // Assuming this should be the current date and time
        
                // Get the totalAmount from the session
                $totalAmount = session('totalAmount');
        
                // Set the 'price' attribute to the totalAmount
                $booking->price = $totalAmount;
        
                $booking->payment = $request->input('payment');
                $booking->save();
        
                // Redirect to VNPAY payment page
                return redirect()->away($vnp_Url);
            } else {
                return response()->json($returnData);
            }

        }
        public function checkoutform($product_id, $schedule_id) {
            // Use the DB::table for the query
            $checkout = DB::table('bookings')
                ->join('account', 'bookings.tourist_id', '=', 'account.id')
                ->join('products', 'bookings.package_id', '=', 'products.id')
                ->join('schedule', 'bookings.sche_id', '=', 'schedule.id')
                ->join('guides', 'bookings.guide_id', '=', 'guides.id')
                ->where('tourist_id', Auth::id())
                ->where('bookings.book_id', $schedule_id)
                ->select(
                    'bookings.*',
                    'account.fullname as tourist_name',
                    'account.phone as tourist_phone',
                    'products.keyword as day',
                    'schedule.date_start as departure_date',
                    'guides.*' // Include all columns from the guides table
                )
                ->first(); // Assuming you expect a single booking
        
            // if (!$checkout) {
            //     return redirect()->back()->with('error', 'Không tìm thấy đơn đặt hàng.');
            // }
        
            return view('interface.pages.checkout', compact('checkout'));
        }

}