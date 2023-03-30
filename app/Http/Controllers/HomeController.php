<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Index for welcome page
        $blogs = Blog::with('author')->orderByDesc('created_at')->take(6)->get();
        return view('welcome', compact('blogs'));
    }
    

    public function home(Request $request)
    {
        // Index for homepage
        $blogs = Blog::query();

        // If a search query is present, filter the results
        if ($request->input('search')) {
            $searchQuery = $request->input('search');
            $blogs->where('title', 'LIKE', "%{$searchQuery}%")
                ->orWhere('content', 'LIKE', "%{$searchQuery}%");
        }

        $blogs = $blogs->with('author')->orderByDesc('created_at')->get();

        return view('homepage', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        // abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('blogs.show', compact('blog'));

    }
}
