<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
    use App\Models\Products;
    use App\Models\Guide;
    use App\Models\Booking;
    use Auth;
use DB;
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
    
        // Thêm điều kiện để chỉ lấy các sản phẩm mà id_cat không bị khóa
        $query->whereHas('category', function ($q) {
            $q->where('status', '=', 1);
        });
    
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
    
    
    

   
    
    // public function packageBooking($product_id, $schedule_id) {
    //     $guides = Guide::where('status', 1)->get();
    
    //     $product = Products::find($product_id);
    
    //     if (!$product) {
    //         return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
    //     }
    
    //     $schedule = Schedule::find($schedule_id);
    
    //     if (!$schedule) {
    //         return redirect()->back()->with('error', 'Không tìm thấy lịch trình.');
    //     }
    
    //     return view('interface/pages/bookingform', compact('guides', 'product', 'schedule'));
    // }
    
    
    
    
    
    

    // public function storeBookingRequest(Request $request){
    //     //dd($request->all());

    //     $this->validate($request, [
    //         'guide' => 'required',
    //         'date' => 'required',
    //     ]);
    


    //     $guide_id = $request->guide;
    //     $date = $request->date;
    //     $package_id = $request->package_id;
    //     $package_name = $request->package_name;
    //     $package_price = $request->package_price;
    //     $day = $request->keyword;


    //     $book = new Booking();
    //     $book->approved_status = false; 
    //     $book->package_name = $package_name;
    //     $book->price = $package_price;
    //     $book->date = $date;
    //     $book->package_id = $package_id;
    //     $book->guide_id = $guide_id;
    //     $book->day = $day;
    //     $book->tourist_id = Auth::id();
    //     $book->save();

    //     $guide = Guide::find($guide_id);
    //     $guide->status = 0;
    //     $guide->save();

    //     session()->flash('success', 'Your Booking Request Send Successfully, Please wait for admin approval');
    //     return redirect(route('gd.pendingbooking'));


    // }
    // public function getGuides(){
    //     $guides = Guide::latest()->paginate(8);
    //     $guideCount = Guide::all()->count();
    //     // Share the $guides variable with all views
    //     // view()->share('guides', $guides);
    //     return response()->view('interface.guide.index',compact( 'guideCount','guides'));
        
    // }

    // public function getGuideDetails($id){
    //     $guide = Guide::find($id);
    //     return response()->view('interface.guide.show',compact('guide'));
    // }

}
