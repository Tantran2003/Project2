<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function categorie()
    {
      $data["categorie"] = Category::get();
      return view("admin/category/category", $data);
    }
    public function add(Request $request)
    {
      if ($request->isMethod("post")) {
        $this->validate($request, [
          "name" => "required",
          "keyword" => "required",
          'image' => 'required|mimes:jpeg,png,gif,jpg,ico|max:4096',
          "desc" => "required",
          "level" => "required|numeric",
  
        ]);
        $cate = new Category();
        $cate->name = $request->name;
        $cate->keyword = $request->keyword;
        $cate->desc = $request->desc;
        $cate->level = $request->level;
        $cate->status = $request->status;
        if ($request->hasFile("image")) {
          $img = $request->file("image");
          $nameimage = time() . "_" . $img->getClientOriginalName();
          //move vao thu vien public
          $img->move('public/file/img/img_category/', $nameimage);
          //gan ten hinh anh vao cot image
          $cate->image = $nameimage;
        }
        $cate->save();
        toastr()->success(' More success!');
        // Session::flash('note','Successfully !');
        return redirect()->route("ht.categorie");
      }
      return view("admin/category/add_cate");
  
    }
    public function update(Request $request, $id = null)
    {
      $olddata["display"] = Category::find($id);
      if ($request->isMethod("post")) {
        $this->validate($request, [
          "name" => "required",
          "keyword" => "required",
          'image' => 'mimes:jpeg,png,gif,jpg,ico|max:4096',
          "desc" => "required",
          "level" => "required|numeric",
        ]);
        $edit = Category::find($id);
        $edit->name = $request->name;
        $edit->keyword = $request->keyword;
        if ($request->hasFile("image")) {
          $img = $request->file("image");
          $nameimage = time() . "_" . $img->getClientOriginalName();
          //xoa hinh cu
          @unlink('public/file/img/img_category/'.$olddata["display"]->image);
          //move vao thu vien public
          $img->move('public/file/img/img_category/',$nameimage);
          //gan ten hinh anh vao cot image
          $edit->image = $nameimage;
        }else{
          $edit->image=$olddata["display"]->image;
        }
        $edit->desc = $request->desc;
        $edit->level = $request->level;
        $edit->status = $request->status;
        $edit->save();
        toastr()->success(' Update success!');
        return redirect()->route("ht.categorie");
      } else {
        return view("admin/category/update_cate", $olddata);
      }
  
    }
    public function delete($id)
    {
      try {
        $load = Category::find($id);
        @unlink('public/file/img/img_category/'.$load->image);
        Category::destroy($id);
        toastr()->success('Delete success !');
        return redirect()->route('ht.categorie'); //chuyen ve trang category
      } catch (\Throwable $th) {
  
        return redirect()->route('ht.categorie'); //chuyen ve trang category
      }
    }
}
