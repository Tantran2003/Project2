<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Products::select('arrivallocation')->distinct()->get();
        $data['destinations'] = $destinations;

        $data["category"] = Category::take(6)->get();     //lấy 6 danh mục từ bảng category
        return view("interface/pages/home", $data);
    }

    

public function search(Request $request)
{
    $departureDate = $request->input('departure_date');
    $arrivalLocation = $request->input('arrivallocation');

    // Kiểm tra cả hai trường đều trống
    if (empty($departureDate) && empty($arrivalLocation)) {
        return redirect()->route('gd.home');
    }

    $query = Products::query();

    if (!empty($departureDate)) {
        $formattedDepartureDate = date('Y-m-d', strtotime($departureDate));
        $query->whereHas('schedule', function ($q) use ($formattedDepartureDate) {
            $q->whereDate('date_start', '=', $formattedDepartureDate);
        });
    }

    if (!empty($arrivalLocation)) {
        $query->where('arrivallocation', '=', $arrivalLocation);
    }

    if (isset($formattedDepartureDate)) {
        $query->with(['schedule' => function ($q) use ($formattedDepartureDate) {
            $q->whereDate('date_start', '=', $formattedDepartureDate);
        }]);
    } else {
        $query->with('schedule');
    }
    $loadproduct = $query->get();
    $data['search'] = $loadproduct;
    $data['destinations'] = DB::table('products')->select('arrivallocation')->get();
    if ($data['search']->isEmpty()) {
        return redirect()->route('gd.noresults');
    }
    return view("interface/pages/search", $data);
}

    public function noresults(){
        return view("interface/pages/no_results");
    }
    
    
    

    // public function autocomplete_ajax(Request $request){
    //     $data=$request->all();
    //     if($data['query']){
    //         $product = Products::where('status', 0)->where('name', 'LIKE', '%'.$data['query'].'%')->get(); 
    //         $output = '<ul class="dropdown-menu" style="display: block; position: relative; z-index:2000;">';
    //         foreach($product as $key => $val) {
    //             $output .= '<li><a href="#">'.$val->name.'</a></li>';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //     }
    // }




}
