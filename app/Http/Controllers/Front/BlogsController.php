<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogsController extends Controller
{
    
    public function index()
    {
        $posts = Post::latest()->get();
		$recent = Post::orderBy('created_at', 'desc')->take(4)->get(); 
        return view('front.pages.blog', compact('posts',('recent')));
    }
	
	
	public function show(){
		
		//return 'tester';
	}
	

    
}
