<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->get();
        return view('interface/pages/blog', compact('blog'));
    }

    public function adminIndex()
    {
        $blogList = Blog::latest()->get();
        return view('admin/blog/blogList', compact('blogList'));
    }

    public function detail($id)
    {
        $blogDetail = Blog::find($id);
        return view('interface/pages/blogDetail', compact('blogDetail'));
    }
    public function create()
    {
        return view('admin/blog/blogCreate');
    }

    public function update(Request $request, $id)
    {
        $blogDetail = Blog::find($id);
        if ($request->isMethod("post")) {
            
            $edit = Blog::find($id);
            $edit->title = $request->title;
            $edit->description = $request->description;
            if ($request->hasFile("image")) {
              $img = $request->file("image");
              $nameimage = time() . "_" . $img->getClientOriginalName();
              //xoa hinh cu
              @unlink('public/file/img/img_blog/'.$blogDetail->image);
              //move vao thu vien public
              $img->move('public/file/img/img_blog/',$nameimage);
              //gan ten hinh anh vao cot image
              $edit->image = $nameimage;
            }else{
              $edit->image=$blogDetail->image;
            }
            $edit->save();
            toastr()->success(' Update success!');
            return redirect()->route("blog.admin.index");
          } else {
            return view('admin/blog/blogUpdate', compact('blogDetail'));
          }
    }

    public function store(Request $request)
    {
        

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/file/img/img_blog'), $imageName);
            $imagePath = $imageName;
        }

        Blog::create([
            'title' =>$request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath
        ]);

        return redirect()->route('blog.admin.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.admin.index');
    }

}
