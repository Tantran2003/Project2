<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Order_momo;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Session;
class PaymentController extends Controller
{
  

    public function pay()
    {
        return view('interface.pages.pay'); // Truyền tổng số tiền vào view
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
           curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Content-Type: application/json',
                   'Content-Length: ' . strlen($data))
           );
           curl_setopt($ch, CURLOPT_TIMEOUT, 5);
           curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
           //execute post
           $result = curl_exec($ch);
           //close connection
           curl_close($ch);
           return $result;
       }
    
       public function momo_payment(Request $request){       
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount =   $_POST['total_momo'];
        $orderId = time() . "";
        $redirectUrl = "http://localhost:84/Project2/payment/confirm";
        $ipnUrl = "http://localhost:84/Project2/payment/confirm";
        $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
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
                'signature' => $signature);
            $result =$this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            if (isset($jsonResult['payUrl'])) {
                $dateTime = Carbon::now();
                $userId = auth()->id();     //lấy id người dùng đang đăng nhập
                // Lưu thông tin thanh toán  vào cơ sở dữ liệu
                DB::table('Order_momo')->insertGetId([
                    'user_id' => $userId,
                    'partner_code' => $partnerCode,
                    'order_id' => $orderId,
                    'amount' => $amount,
                    'order_info' => $orderInfo,
                    'created_at'=>  $dateTime,
                    'updated_at'=> $dateTime
                ]);
                $bookingdetails = $request->session()->get('booking');
                DB::table('bookings')->insert([
                    'order_id' => $orderId,
                    'user_id' =>  $bookingdetails['user_id'],
                    'schedule_id' =>  $bookingdetails['schedule_id'],
                    'fullname' =>  $bookingdetails['fullname'],
                    'email' =>  $bookingdetails['email'],
                    'phone' =>  $bookingdetails['phone'],
                    'address' =>  $bookingdetails['address'],
                    'departurelocation' =>  $bookingdetails['departurelocation'],
                    'arrivallocation' =>  $bookingdetails['arrivallocation'],
                    'date_start' =>  $bookingdetails['date_start'],
                    'date_end' =>  $bookingdetails['date_end'],
                    'vehicle' =>  $bookingdetails['vehicle'],
                    'keyword' =>  $bookingdetails['keyword'],
                    'tour_code' =>  $bookingdetails['tour_code'],
                    'person1' =>  $bookingdetails['person1'],
                    'person2' =>  $bookingdetails['person2'],
                    'person3' =>  $bookingdetails['person3'],
                    'price1' =>  $bookingdetails['price1'],
                    'price2' =>  $bookingdetails['price2'],
                    'price3' =>  $bookingdetails['price3'],
                    'price0' =>  $bookingdetails['price0'],
                    'total_price' =>  $bookingdetails['total_price'],

                    // Các trường khác...
                ]);
            //Just a example, please check more in there
       return redirect()->to($jsonResult['payUrl']);
            }
       
    }
    }


