<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class HomeController extends Controller
{
    // public function index(){
    //     return view('welcome',['blog' => Blog::all()]);
    // }
    public function index()
    {
        $blogs = Blog::with('author')->orderByDesc('created_at')->get();
        return view('welcome', compact('blogs'));
    }

    public function dash()
    {
        $blogs = Blog::with('author')->orderByDesc('created_at')->get();
        return view('dashboard', compact('blogs'));
    }

    public function show(Blog $blog)
    {
       
           
                return view('blogs.show', compact('blog'));

        // abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // return view('blogs.show', compact('blog'));
    }
}
