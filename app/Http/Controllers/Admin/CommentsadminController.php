<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductRating;
class CommentsadminController extends Controller
{
  public function comments(){
    $data['comments'] = ProductRating::get();
    return view('admin/comments/comments',$data);
  }
  public function delete($id)
    {
      try {
        ProductRating::destroy($id);
        toastr()->success('Xóa thành công !');
        return redirect()->route('ht.comments'); 
      } catch (\Throwable $th) {
  
        return redirect()->route('ht.comments'); 
      }
    }
}
