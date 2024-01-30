<?php 

if(!function_exists('vnpayConfig')){
    function vnpayConfig(){
        return [
            'vnp_Url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
            'vnp_Returnurl' => 'http://localhost:83/Project2/payment/confirm',
            'vnp_TmnCode' => "OB1XYIE4",
            'vnp_HashSecret' => "HLDJBDGWMOSVOWBNQLMAJVWTSWUPQXGS",
        ];
    }
}