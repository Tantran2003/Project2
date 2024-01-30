<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
class TourlistController extends Controller
{
 
   public function index($id = null){
      try {
         if($id == 0){
            $data['loadproduct'] =Products::with('schedule')->whereHas('category', function($query) {
               $query->where('status', 1);
           })->where('status', 1)->get();  
         }else{
            $data['loadproduct'] = Products::where('idcat', $id)->whereHas('category', function($query) {
               $query->where('status', 1);
           })->get();
         }  
      
         return view('interface/pages/tour',$data);
      } catch (\Throwable $th) {
         return redirect()->route('gd.home');
      }  
   }
   public function filterProducts(Request $request)
   {
       // tạo 2 biến và lấy giá trị từ request qua name của 2 select
       $filterBy = $request->input('filterBy');
       $priceRange = $request->input('priceRange');
       $departureDate = $request->input('departureday');
       // Khởi tạo một câu truy vấn sử dụng Eloquent ORM cho model 
       $loadproduct = Products::query()->where('status', 1)
       ->whereHas('schedule', function ($query) {
         $query->where(function ($subquery) {
            $subquery->where('status', 1)
                     ->orWhereNull('status');
        })
        ->whereNotNull('tour_code');
       });
   
      
       // chọn khoảng giá hay chọn all giá nếu chọn all giá thì load all giá còn ko thì tiếp tục xử lý
       if ($priceRange && $priceRange !== '0-all') {
           // Tách chuỗi khoảng giá thành một mảng, ví dụ: "5000000-10000000" trở thành [$minPrice, $maxPrice]
           $priceRangeArray = explode('-', $priceRange);
   
           // kiểm tra xem mảng có lớn hơn 2 phàn tử ko sau đó gán giá trị từ mảng $priceRangeArray vào 2 biến $minprice và $maxprice
           if (count($priceRangeArray) >= 2) {
               list($minPrice, $maxPrice) = $priceRangeArray;
   
               // điều kiện so sánh giá, loại bỏ dấu chấm và khoảng trắng và vnđ trở thành kiểu số(5.000 vnđ -> 5000)
               $loadproduct->whereRaw('CAST(REPLACE(REPLACE(price, ".", ""), " vnđ", "") AS UNSIGNED) >= ?', [$minPrice])
                           ->whereRaw('CAST(REPLACE(REPLACE(price, ".", ""), " vnđ", "") AS UNSIGNED) <= ?', [$maxPrice]);
           }
       }
   
       // Sắp xếp theo giá trước khi áp dụng lọc
       if ($filterBy === 'lowToHigh') {
           $loadproduct->orderByRaw('CAST(REPLACE(REPLACE(price, ".", ""), " vnđ", "") AS UNSIGNED) ASC');  //REPLACE(REPLACE(price, ".", ""), " vnđ", "") loại bỏ dấu chấm chuyển đổi từ chuỗi sang dạng số
       } elseif ($filterBy === 'highToLow') {
           $loadproduct->orderByRaw('CAST(REPLACE(REPLACE(price, ".", ""), " vnđ", "") AS UNSIGNED) DESC'); //CAST(... AS UNSIGNED) chuyển sang số nguyên ko dấu
       }
   // ...

 
  $loadproduct->with(['schedule' => function ($query) use ($departureDate) {
   if ($departureDate) {
       $formattedDepartureDate = date('Y-m-d', strtotime($departureDate));
       $query->whereDate('date_start', '=', $formattedDepartureDate);
   }
}]);
// ...


       $loadproduct = $loadproduct->get();
   
       return view('interface.pages.tour', [
         'loadproduct' => $loadproduct,
         'filterBy' => $filterBy,
         'priceRange' => $priceRange,
         'departureday' => $departureDate,
     ]);
   }
   
   



}
