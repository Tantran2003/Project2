<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\ProductRating;
use Auth;
class DetailsController extends Controller
{
   
    public function index($product_id, $schedule_id)
    {
        $details = DB::table('products')
            ->join('schedule', 'products.id', '=', 'schedule.tour_id')
            ->select('products.*', 'schedule.*')
            ->where('products.id', '=', $product_id)
            ->where('schedule.id', '=', $schedule_id)
            ->get();
            
        $ratings = ProductRating::where('product_id', $product_id)->get();
    
        foreach ($details as $detail) {
            if (isset($detail->images) && is_string($detail->images)) {
                $detail->images = json_decode($detail->images, true);
            }
        }
    
        $data = [
            'details' => $details,
            'ratings' => $ratings,
            'product_id' => $product_id,
            'schedule_id' => $schedule_id
        ];
    
        return view('interface/pages/details_tour', $data);
    }
    

public function saveRating(Request $request, $id = null)
{
    $messages = [
        "comment.required" => "Vui lòng nhập đánh giá",
        "rating.required" => "Vui lòng đánh giá"

    ];
    if ($request->isMethod("post")) {
        $this->validate($request, [
            "comment" => "required",
            "rating" => "required",

            // Thêm các rules khác nếu cần
        ],$messages);

        $productRating = new ProductRating();
        $productRating->product_id = $id;
        $productRating->user_id = Auth::id(); 
        $productRating->username = Auth::user()->fullname; 
        $productRating->email = Auth::user()->email; 
        $productRating->comment = $request->comment;
        $productRating->rating = $request->rating;
        $productRating->status = 0;

        $productRating->save();
        $ratings = ProductRating::where('product_id', $id)->get();

        return redirect()->back()->with('ratings', $ratings);
    }

    return view('interface/pages/details_tour');
}
function delete($id)
{
    ProductRating::where('id',$id)->delete();
    return redirect()->back();
}
    
    
    
}
