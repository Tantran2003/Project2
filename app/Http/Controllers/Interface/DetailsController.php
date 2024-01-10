<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
class DetailsController extends Controller
{
   

    public function index($id, $dateStart = null){
        $dateStart = $dateStart ?? now()->toDateString();
    
        $data['details'] = Products::with(['schedule' => function ($query) use ($dateStart) {
            $query->whereDate('date_start', '=', $dateStart);
        }])
        ->find($id);
    
        // Chuyển đổi chuỗi JSON thành mảng cho trường images
        if(isset($data['details']->images) && is_string($data['details']->images)){
            $data['details']->images = json_decode($data['details']->images, true);
        }
        $data['dateStart'] = $dateStart;
        return view('interface/pages/details_tour', $data);
    }
    
    
}
