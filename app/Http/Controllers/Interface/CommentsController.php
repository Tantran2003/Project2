<?php

namespace App\Http\Controllers\Interface;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class CommentsController extends Controller
{
    public function index(){
        
        $post=Post::all();
        return view("interface/pages/comments",compact('post'));
    }
}
