<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Booking;
use App\Models\Guide;
use Auth;
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

    public function packageBooking($id){
        $guides = Guide::where('status', 1)->get();
        $package = Schedule::where('id', $id)->first();
    
        if (!$package) {
            // Handle the case where the product with the given ID is not found
            abort(404);
        }
    
        return response()->view('interface/pages/bookingForm', compact('guides', 'package'));
    }
    

    public function storeBookingRequest(Request $request){
        //dd($request->all());

        $this->validate($request, [
            'guide' => 'required',
            'date' => 'required',
        ]);
    


        $guide_id = $request->guide;
        $date = $request->date;
        $package_id = $request->package_id;
        $package_name = $request->package_name;
        $package_price = $request->package_price;
        $day = $request->day;


        $book = new Booking();
        $book->package_name = $package_name;
        $book->price = $package_price;
        $book->date = $date;
        $book->package_id = $package_id;
        $book->guide_id = $guide_id;
        $book->day = $day;
        $book->tourist_id = Auth::id();
        $book->save();

        $guide = Guide::find($guide_id);
        $guide->status = 0;
        $guide->save();

        session()->flash('success', 'Your Booking Request Send Successfully, Please wait for admin approval');
        return redirect()->back();


    }
    public function getGuides(){
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        // Share the $guides variable with all views
        // view()->share('guides', $guides);
        return response()->view('interface.guide.index',compact( 'guideCount','guides'));
        
    }

    public function getGuideDetails($id){
        $guide = Guide::find($id);
        return response()->view('interface.guide.show',compact('guide'));
    }

}
