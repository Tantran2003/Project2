<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Order_momo;
use App\Models\Order_vnpay;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Booking;
use Mail;
use Carbon\Carbon;
Use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Bus\Queueable;
use App\Mail\BookingSuccess;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class PaymentController extends Controller
{
    public function pay()
    {
        return view('interface.pages.pay');
    }

    public function confirmPayment(Request $request)
    {
        return view('interface.pages.thankyou');
        // Redirect hoặc trả về response tùy theo yêu cầu của bạn
    }


    public function execPostRequest($url, $data)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function momo_payment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://localhost:83/Project2/payment/confirm";
        $ipnUrl = "http://localhost:83/Project2/payment/confirm";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";
        //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        if (isset($jsonResult['payUrl'])) {
            $dateTime = Carbon::now();
            $userId = auth()->id();     //lấy id người dùng đang đăng nhập
            // Lưu thông tin thanh toán  vào cơ sở dữ liệu
            DB::table('order_momo')->insertGetId([
                'user_id' => $userId,
                'partner_code' => $partnerCode,
                'order_id' => $orderId,
                'amount' => $amount,
                'order_info' => $orderInfo,
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
            $order= DB::table('order_momo')->where('order_id','=',$orderId)->first();      
            $bookingdetails = $request->session()->get('booking');
            DB::table('bookings')->insert([
                'order_id' => $order->id,
                'order_id_momo' => $orderId,
                'user_id' => $bookingdetails['user_id'],
                'schedule_id' => $bookingdetails['schedule_id'],
                'fullname' => $bookingdetails['fullname'],
                'email' => $bookingdetails['email'],
                'phone' => $bookingdetails['phone'],
                'address' => $bookingdetails['address'],
                'departurelocation' => $bookingdetails['departurelocation'],
                'arrivallocation' => $bookingdetails['arrivallocation'],
                'date_start' => $bookingdetails['date_start'],
                'date_end' => $bookingdetails['date_end'],
                'vehicle' => $bookingdetails['vehicle'],
                'keyword' => $bookingdetails['keyword'],
                'tour_code' => $bookingdetails['tour_code'],
                'person1' => $bookingdetails['person1'],
                'person2' => $bookingdetails['person2'],
                'person3' => $bookingdetails['person3'],
                'price1' => $bookingdetails['price1'],
                'price2' => $bookingdetails['price2'],
                'price3' => $bookingdetails['price3'],
                'price0' => $bookingdetails['price0'],
                'total_price' => $bookingdetails['total_price'],

                // Các trường khác...
            ]);
            try {
                Mail::to($bookingdetails['email'])->send(new BookingSuccess(['booking' => $order]));

            } catch (\Exception $e) {
                \Log::error('Error sending booking success email: ' . $e->getMessage());
            }
    
            // Redirect to MoMo payment URL
            return redirect()->to($jsonResult['payUrl']);
        }

    }
    


    //     public function vnpay_payment($order)
    // {   
    //     $configVnpay = vnpayConfig();
    //     $vnp_Url = $configVnpay()['vnp_Url'];
    //     $vnp_Returnurl = $configVnpay()['vnp_Returnurl'];
    //     $vnp_TmnCode =$configVnpay()['vnp_TmnCode']; //Mã website tại VNPAY 
    //     $vnp_HashSecret = $configVnpay()['vnp_HashSecret']; //Chuỗi bí mật
        

    //     $vnp_TxnRef = $order -> code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    //     $vnp_OrderInfo = (!empty($order->name)) ? $order->name : 'Transaction #'. $order->code.'vnpay';
    //     $vnp_OrderType = "TravelTour";
    //     $vnp_Amount = ($order->booking['total_momo']) * 100;
    //     // floatval(Session::get('total_price')) * 100
    //     $vnp_Locale = "VN";
        
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    //     $inputData = [
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //     ];
    //     dd($inputData);
    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }

    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;

    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array(
    //         'code'=> '00',
    //         'message'=> 'succes',
    //         'data'=> $vnp_Url
    //     );

    //     if (isset($_POST['redirect'])) {
    //         header('Location: ' . $vnp_Url);
    //         die();
    //     } else {
    //         echo json_encode(['code' => '00', 'message' => 'success', 'data' => $vnp_Url]);
    //     }
}