<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){

        $data['hotproduct']=Products::take(8)->orderby('id','desc')->get();
        $data['random']=Products::inRandomOrder()->limit(8)->get();
        $data['danhmuc']=Category::take(6)->get();
        return view("interface/pages/home",$data);
    }

    public function category($id=null){
        try{
            $data['loadsp']=Products::where('id_cat',$id)->paginate(8);
            return view("giaodien/pages/category",$data);
        }catch(\Throwable $th){
            return redirect()->route('gd.home');
        }
        
    }

    public function detail($name=null,$id=null){
        $data['detail']=Products::where('id',$id)->where("status",1)->first();
        if($data['detail']){
            $data['random']=Products::where('id_cat',$data['detail']->id_cat)->inRandomOrder()->limit(8)->get();
            return view('giaodien/pages/details',$data);
        }else{
            return redirect()->route('gd.home');
        }
        
    }
    public function search(Request $request){
        // $key=$_GET['keyword'];
        $search= $request->input('keyword');
        // $search=trim(htmlspecialchars($search, ENT_QUOTES, "UTF-8"));
        $data['search']= Products::where("name","LIKE","%$search%")
                                ->orwhere("price","LIKE","%$search%")
                                ->orwhere("desc","LIKE","%$search%")->paginate(8);
        if($data['search']){
            return view('giaodien/pages/search',$data);

        }else{
            return redirect()->route('gd.home');
        }
    }   
    public function tourpackages()
    {
        // Retrieve categories for tour packages
        $categories = Category::all(); // Adjust the query according to your needs
        
        // Pass categories to the view 'tourpackages'
        return view('interface.pages.packages', compact('categories'));
    }
    
}
