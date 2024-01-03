<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
class HomeController extends Controller
{
    public function index(){
        $data["category"] = Category::take(6)->get();     //lấy 6 danh mục từ bảng category
        return view ("interface/pages/home",$data);
    }
    
    public function search(Request $request)
    {

        $search = $request->input('keyword');
        if (empty($search)) {                         // dùng empty kiểm tra xem biến search có trống ko
            return redirect()->route('gd.home');
        }
        $data['search'] = Products::where('status', 1)
            ->where('name', 'like','%'.$search.'%')
            ->orWhere('desc', 'LIKE', "%{$search}%")
            ->orWhere('keyword', 'LIKE', "%{$search}%")
            ->orWhere('departurelocation', 'LIKE', '%'.$search.'%') 
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();
        if ($data['search']->count() > 0) {               
            return view("interface/pages/search", $data);
        } else {
            return view("interface/pages/home", ['search' => $data['search'], 'request' => $request]);
        }
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
