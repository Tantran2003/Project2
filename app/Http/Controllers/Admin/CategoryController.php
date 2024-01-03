<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tourlistmonthly;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function tourmonthlist()
    {
      $data["tourlistmonthly"] = Tourlistmonthly::get();
      $data["cate"] = $data["tourlistmonthly"];
      return view("admin/category/category", $data);
    }
    public function addtourmonthlist(Request $request)
    {
      if ($request->isMethod("post")) {
        $this->validate($request, [
          "name" => "required",
          "keyword" => "required",
          'language' => 'required',
          "level" => "required",
          "status" => "required|numeric",
  
        ]);
        $cate = new Tourlistmonthly();
        $cate->name = $request->name;
        $cate->keyword = $request->keyword;
        $cate->language = $request->language;
        $cate->level = $request->level;
        $cate->status = $request->status;
        // if ($request->hasFile("image")) {
        //   $img = $request->file("image");
        //   $nameimage = time() . "_" . $img->getClientOriginalName();
        //   //move vao thu vien public
        //   $img->move('public/file/img/img_category/', $nameimage);
        //   //gan ten hinh anh vao cot image
        //   $cate->image = $nameimage;
        // }
        $cate->save();
        toastr()->success(' More success!');
        // Session::flash('note','Successfully !');
        return redirect()->route("ht.tourmonthlist");
      }
      return view("admin/category/add_cate");
  
    }
    public function updatetourmonthlist(Request $request, $id = null)
    {
      $olddata["display"] = Tourlistmonthly::find($id);
      if ($request->isMethod("post")) {
        $this->validate($request, [
          "name" => "required",
          "keyword" => "required",
          'language' => "required",
          "desc" => "required",
          "level" => "required|numeric",
        ]);
        $edit = Tourlistmonthly::find($id);
        $edit->name = $request->name;
        $edit->keyword = $request->keyword;
        
        $edit->language = $request->language;
        $edit->level = $request->level;
        $edit->status = $request->status;
        $edit->save();
        toastr()->success(' Update success!');
        return redirect()->route("ht.categorie");
      } else {
        return view("admin/category/update_cate", $olddata);
      }
  
    }
    public function deletetourmonthlist($id)
    {
      try {
        $load = Tourlistmonthly::find($id);
        @unlink('public/file/img/img_category/'.$load->image);
        Tourlistmonthly::destroy($id);
        toastr()->success('Delete success !');
        return redirect()->route('ht.categorie'); //chuyen ve trang category
      } catch (\Throwable $th) {
  
        return redirect()->route('ht.categorie'); //chuyen ve trang category
      }
    }
}
