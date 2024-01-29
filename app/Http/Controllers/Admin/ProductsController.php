<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Carbon\Carbon;

class ProductsController extends Controller
{
  public function products()
  {
    $data["products"] = Products::get();
    return view("admin/products/products", $data);
  }
  public function add(Request $request)
  {
    if ($request->isMethod("post")) {
      $this->validate($request, [
        "name" => "required",
        "keyword" => "required",
        "vehicle" => "required",
        "desc" => "required",
        "content" => "required",
        "price" => "required",
        "price1" => "required",
        "price2" => "required",
        "price3" => "required",
        'image' => 'required|mimes:jpeg,png,gif,jpg,ico|max:4096',
  
        'images.*' => 'required|mimes:jpeg,bmp,png,gif,jpg|max:4096|min:7',

        //"idcat" => "required",
        // "departuredate" => 'required|date_format:Y-m-d\TH:i',
        "arrivallocation" => "required",
        "departurelocation" => "required",

        // "dateedit" => "required",
        "status" => "required",
      ]);
      $prod = new Products();
      $prod->name = $request->name;
      $prod->keyword = $request->keyword;
      $prod->vehicle = $request->vehicle;
      $prod->desc = $request->desc;
      $prod->content = $request->content;
      $prod->price = $request->price;
      $prod->price1 = $request->price1;
      $prod->price2 = $request->price2;
      $prod->price3 = $request->price3;
      $prod->idcat = $request->idcat;
      $prod->departurelocation = $request->departurelocation;
      $prod->arrivallocation = $request->arrivallocation;
      $prod->status = $request->status;
      if ($request->hasFile("image")) {
        $img = $request->file("image");
        $nameimage = time() . "_" . $img->getClientOriginalName();
        //move vao thu vien public
        $img->move('public/file/img/img_product/', $nameimage);
        //gan ten hinh anh vao cot image
        $prod->image = $nameimage;
      }
      if ($request->hasfile('images')) {
        foreach ($request->file('images') as $file) {
          $name = time() . '_at_' . $file->getClientOriginalName();
          $file->move('public/file/img/img_product/', $name);
          $image[] = $name;

        }
        $prod->images = json_encode($image);
      }
      // $prod->images = $request->images;
      // $prod->departureday = date('Y-m-d H:i:s', strtotime($request->departuredate));
      $prod->save();
      toastr()->success('Thêm thành công!');
      // Session::flash('note','Successfully !');
      return redirect()->route("ht.products");
    } else {
      $data["cate"] = Category::where("status", 1)->get();
      return view("admin/products/add_pro", $data);
    }

    // //////////////////////////////////////////////////////////////////////////////
  }
  public function update(Request $request, $id)
  {
    $data["load"] = Products::find($id);
    if ($request->isMethod("post")) {
      $this->validate($request, [
        "name" => "required",
        "keyword" => "required",
        "vehicle" => "required",
        "desc" => "required",

        "price" => "required",
        "price1" => "required",
        "price2" => "required",
        "price3" => "required",
        'image' => 'mimes:jpeg,png,gif,jpg,ico|max:4096',
        // "departuredate" => 'required|date_format:Y-m-d\TH:i',

        "arrivallocation" => "required",
        "departurelocation" => "required",

      ]);
      $edit = Products::find($id);
      $edit->name = $request->name;
      $edit->keyword = $request->keyword;
      $edit->vehicle = $request->vehicle;
      $edit->desc = $request->desc;
      $edit->content = $request->content;
      $edit->price = $request->price;
      $edit->price1 = $request->price1;
      $edit->price2 = $request->price2;
      $edit->price3 = $request->price3;
      if ($request->hasFile("image")) {
        $img = $request->file("image");
        $nameimage = time() . "_" . $img->getClientOriginalName();
        //xoa hinh cu
        @unlink('public/file/img/img_product/' . $data["load"]->image);
        //move vao thu vien public
        $img->move('public/file/img/img_product/', $nameimage);
        //gan ten hinh anh vao cot image
        $edit->image = $nameimage;
      }

      if ($request->hasfile('images')) {
        if ($edit->images != "") {
          foreach (json_decode($edit->images) as $key) {
            @unlink('public/file/img/img_product/' . $key);
          }
        }
        foreach ($request->file('images') as $file) {
          $name = time() . '_at_' . $file->getClientOriginalName();
          $file->move('public/file/img/img_product/', $name);
          $image[] = $name;

        }
        $edit->images = json_encode($image);
      }

      $edit->idcat = $request->idcat;
      // $edit->departureday = date('Y-m-d H:i:s', strtotime($request->departuredate));
      $edit->departurelocation = $request->departurelocation;
      $edit->arrivallocation = $request->arrivallocation;
      $edit->status = $request->status;
      $edit->save();
      toastr()->success('Cập nhật thành công!');
      return redirect()->route("ht.products");
    } else {
      $data["cate"] = Category::where("status", 1)->get();
      return view("admin/products/update_pro", $data);
    }

  }
  public function delete($id)
  {
    try {
      if (Schedule::where('tour_id', $id)->exists()) {

        toastr()->error('Vui lòng xóa hết lịch trình của chuyến tour này trước khi xóa tour');
        return redirect()->route('ht.products');
      }
      $delete = Products::find($id);

      @unlink('public/file/img/img_product/' . $delete->image);
      if ($delete->images != "") {
        // Giải mã JSON để có danh sách tên file hình ảnh
        $images = json_decode($delete->images);

        // Xóa hình ảnh
        foreach ($images as $key) {
          @unlink('public/file/img/img_product/' . $key);
        }
      }
      Products::destroy($id);

      toastr()->success('Xóa thành công !');
      return redirect()->route('ht.products');
    } catch (\Throwable $th) {
      return redirect()->route('ht.products');
    }
  }
  public function viewdetails($id = null)
  {
    $data["viewproducts"] = Products::where('id', '=', $id)->get();
    return view("admin/products/viewdetails", $data);
  }

  // public function show($id)
//     {
//         $news = News:
//         $des = html_entity_decode($news->description);
//         return view('/admin/news_detail', compact('news', 'des'));
//     }
}
