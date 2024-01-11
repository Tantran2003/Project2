<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Products;
class ScheduleController extends Controller
{
    public function schedule(){
        $data["schedule"] = Schedule::get();
    return view("admin/schedule/schedule", $data);
    }
    public function add(Request $request){
        if ($request->isMethod("post")) {
            $this->validate($request, [
              "date_start" => "required",
              "date_end" => "required",
              "tour_code" => "required",  
            ]);
            $sche = new Schedule();
            // $prod->images = $request->images;
            $sche->tour_id = $request->tour_id;
            $sche->date_start = date('Y-m-d H:i:s', strtotime($request->date_start));
            $sche->date_end = date('Y-m-d H:i:s', strtotime($request->date_end));
            $sche->status = $request->status;
            $sche->tour_code = $request->tour_code;
            $sche->save();
            toastr()->success('Thêm thành công!');
            // Session::flash('note','Successfully !');
            return redirect()->route("ht.schedule");
          } else {
            $data["schedule"] = Products::where("status", 1)->get();
            return view("admin/schedule/addschedule",$data);
          }
      
    }
    public function update(Request $request, $id){
    $data["load"] = Schedule::find($id);
        if ($request->isMethod("post")) {
            $this->validate($request, [
              "date_start" => "required",
              "date_end" => "required",
              "tour_code" => "required",            
            ]);
            $edit =  Schedule::find($id);

            $edit->tour_id = $request->tour_id;
            $edit->date_start = date('Y-m-d H:i:s', strtotime($request->date_start));
            $edit->date_end = date('Y-m-d H:i:s', strtotime($request->date_end));
            $edit->status = $request->status;
            $edit->tour_code = $request->tour_code;

            $edit->save();
            toastr()->success('Sửa thành công!');
            // Session::flash('note','Successfully !');
            return redirect()->route("ht.schedule");
          } else {
            $data["schedule"] = Products::where("status", 1)->get();
            return view("admin/schedule/updateschedule",$data);
          }
    }
    public function delete($id)
    {
      try {
   
    
        Schedule::destroy($id);
        toastr()->success('Xóa thành công !');
        return redirect()->route('ht.schedule'); //chuyen ve trang category
      } catch (\Throwable $th) {
  
        return redirect()->route('ht.schedule'); //chuyen ve trang category
      }
    }}
