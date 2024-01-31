<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
class ScheduleController extends Controller
{
    public function schedule(){
        $data["schedule"] = Schedule::get();
    return view("admin/schedule/schedule", $data);
    }
    public function add(Request $request)
    {
      $messages = [

        'date_start.before_or_equal' => 'Ngày đi phải trước ngày kết thúc',   
        'date_end.after_or_equal' => 'Ngày kết thúc phải sau ngày đi ',   
        'tour_code.unique' => 'Mã tour không được trùng'

    ];
        if ($request->isMethod("post")) {
            $validator = Validator::make($request->all(), [
                "date_start" => "required|before_or_equal:date_end",
                "date_end" => "required|after_or_equal:date_start",
                "tour_code" => "required|unique:schedule,tour_code",
            ],$messages);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->only('tour_code'));
            }
    
            // Kiểm tra xem ngày đã tồn tại trong cơ sở dữ liệu hay không
            $existingSchedule = Schedule::where(function ($query) use ($request) {
                $query->where('date_start', '<=', $request->date_end)
                    ->where('date_end', '>=', $request->date_start)
                    ->where('tour_id', $request->tour_id);
            })->first();
    
            if ($existingSchedule) {
                toastr()->error('Lịch trình đã tồn tại cho chuyến đi này!');
                return redirect()->back();
            }
    
            // Nếu không có lịch trình tồn tại, thêm mới
            $schedule = new Schedule();
            $schedule->tour_id = $request->tour_id;
            $schedule->date_start = date('Y-m-d H:i:s', strtotime($request->date_start));
            $schedule->date_end = date('Y-m-d H:i:s', strtotime($request->date_end));
            $schedule->status = 1;
            $schedule->tour_code = $request->tour_code;
            $schedule->save();
    
            toastr()->success('Thêm lịch trình thành công!');
            return redirect()->route("ht.schedule");
        } else {
            $data["schedule"] = Products::where("status", 1)->get();
            return view("admin/schedule/addschedule", $data);
        }
    }
    
    public function update(Request $request, $id){
      $messages = [

        'date_start.before_or_equal' => 'Ngày đi phải trước ngày kết thúc',   
        'date_end.after_or_equal' => 'Ngày kết thúc phải sau ngày đi ',   
        'tour_code.unique' => 'Mã tour không được trùng'

    ];
    $data["load"] = Schedule::find($id);
        if ($request->isMethod("post")) {
          $validator = Validator::make($request->all(), [
              "date_start" => "required|before_or_equal:date_end",
              "date_end" => "required|after_or_equal:date_start",
              "tour_code" => "required|unique:schedule,tour_code",      
            ],  $messages);
            if ($validator->fails()) {
              return redirect()->back()->withErrors($validator)->withInput($request->only('tour_code'));
          }
            // Kiểm tra xem ngày đã tồn tại trong cơ sở dữ liệu hay không
            $existingSchedule = Schedule::where(function ($query) use ($request) {
              $query->where('date_start', '<=', $request->date_end)
                  ->where('date_end', '>=', $request->date_start)
                  ->where('tour_id', $request->tour_id);
          })->first();
  
          if ($existingSchedule) {
              toastr()->error('Lịch trình đã tồn tại trong cơ sở dữ liệu!');
              return redirect()->back();
          }
            $edit =  Schedule::find($id);
            $edit->tour_id = $request->tour_id;
            $edit->date_start = date('Y-m-d H:i:s', strtotime($request->date_start));
            $edit->date_end = date('Y-m-d H:i:s', strtotime($request->date_end));
            $edit->status = $request->status;
         
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
