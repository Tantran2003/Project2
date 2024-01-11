<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
class DetailsController extends Controller
{
   

    public function index($id, $dateStart = null, $dateEnd = null,$tourcode = null){
        $dateStart = $dateStart ?? now()->toDateString();
        $dateEnd = $dateEnd ?? now()->toDateString();
        $tourcode = $tourcode ?? now()->toDateString();
    
        $data['details'] = Products::with(['schedule' => function ($query) use ($dateStart, $dateEnd,$tourcode) {
            $query->whereDate('date_start', '=', $dateStart)
                  ->whereDate('date_end', '=', $dateEnd)
                  ->whereDate('tour_code', '=', $tourcode);

        }])
        ->find($id);
    
        // Chuyển đổi chuỗi JSON thành mảng cho trường images
        if (isset($data['details']->images) && is_string($data['details']->images)) {
            $data['details']->images = json_decode($data['details']->images, true);
        }
    
        $data['dateStart'] = $dateStart;
        $data['dateEnd'] = $dateEnd;
        $data['tourcode'] = $tourcode;
    
        return view('interface/pages/details_tour', $data);
    }
    
    
    
}
