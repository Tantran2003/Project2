<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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


        // "content" => "required",
        "price" => "required",
        "price1" => "required",
        "price2" => "required",
        "price3" => "required",

        'image' => 'required|mimes:jpeg,png,gif,jpg,ico|max:4096',
        'images.*'=>'mimes:jpeg,bmp,png,gif,jpg|max:4096',
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
      if ($request->hasFile("image")) {
        $img = $request->file("image");
        $nameimage = time() . "_" . $img->getClientOriginalName();
        //move vao thu vien public
        $img->move('public/file/img/img_product/', $nameimage);
        //gan ten hinh anh vao cot image
        $prod->image = $nameimage;
      }
      if($request->hasfile('images')) {
        foreach($request->file('images') as $file){
            $name=time().'_at_'.$file->getClientOriginalName();
            $file->move('public/file/img/img_product/',$name); 
            $image[] = $name;  
          
        }
        $prod->images=json_encode($image);
      }
      // $prod->images = $request->images;
      $prod->idcat = $request->idcat;
      // $prod->departureday = date('Y-m-d H:i:s', strtotime($request->departuredate));
      $prod->departurelocation = $request->departurelocation;
      $prod->arrivallocation = $request->arrivallocation;
      $prod->vehicle = $request->vehicle;
     

      
      $prod->status = $request->status;
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
    $data["products"] = Products::find($id);
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
        'image' => 'mimes:jpeg,png,gif,jpg,ico|max:4096',
        // "departuredate" => 'required|date_format:Y-m-d\TH:i',
        "vehicle" => "required",
        "arrivallocation" => "required",
        "departurelocation" => "required",

      ]);
      $edit = new Products();
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
        @unlink('public/file/img/img_product/'.$data["load"]->image);
        //move vao thu vien public
        $img->move('public/file/img/img_product/', $nameimage);
        //gan ten hinh anh vao cot image
        $edit->image = $nameimage;
      }
      if($request->hasfile('images')) {
        if($edit->images!=""){
          foreach (json_decode($edit->images) as $key) {
            @unlink('public/file/img/img_product/'.$key);
          }
        }
        foreach($request->file('images') as $file){
            $name=time().'_at_'.$file->getClientOriginalName();
            $file->move('public/file/img/img_product/',$name); 
            $image[] = $name;
              
        }
        $edit->images=json_encode($image);
}
      $edit->price = $request->price;
      $edit->price1 = $request->price1;
      $edit->price2 = $request->price2;
      $edit->price3 = $request->price3;
      $edit->idcat = $request->idcat;
      // $edit->departureday = date('Y-m-d H:i:s', strtotime($request->departuredate));
      $edit->departurelocation = $request->departurelocation;
      $edit->arrivallocation = $request->arrivallocation;
      $edit->vehicle = $request->vehicle;
      $edit->status = $request->status;
      $edit->content = $request->content;
      $edit->save();
      toastr()->success(' Update success!');
      return redirect()->route("ht.products");
    } else {
      $data["cate"] = Category::where("status", 1)->get();
      return view("admin/products/update_pro", $data);
    }

  }
  public function delete($id)
  {
    try {
      $load = Products::find($id);
      @unlink('public/file/img/img_product/'.$load->image);
      Products::destroy($id);
      toastr()->success('Delete success !');
      return redirect()->route('ht.products'); //chuyen ve trang category
    } catch (\Throwable $th) {

      return redirect()->route('ht.products'); //chuyen ve trang category
    }
  }

}
