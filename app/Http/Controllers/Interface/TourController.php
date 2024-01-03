<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class TourController extends Controller
{
    public function index()
    {
      $data["tourlistmonthly"] = Category::get();
      return view("admin/category/category", $data);
    }
    
    // Xử lý route /tourdates/{category_id}
    public function tourdates($category_id)
    {
        // Lấy danh mục dựa trên category_id
        $category = Category::find($category_id);

        // Lấy danh sách các tour thuộc danh mục này
        $tours = $category->tours; // Giả sử có một quan hệ tương ứng trong model

        // Trả về view 'tourdates' với dữ liệu tours và category
        return view('tourdates', compact('tours', 'category'));
    }

    // Xử lý route /tourconfirm/{tour_id}
    public function tourconfirm($tour_id)
    {
        // Lấy thông tin chi tiết tour dựa trên tour_id
        $tour = Tour::find($tour_id);

        // Trả về view 'tourconfirm' với dữ liệu tour
        return view('tourconfirm', compact('tour'));
    }
}
