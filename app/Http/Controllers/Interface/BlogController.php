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
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

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

        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully.');
    }

}
