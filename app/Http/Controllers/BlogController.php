<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Requests\DeleteBlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogs = Blog::query();

        // If a search query is present, filter the results
        if ($request->input('search')) {
            $searchQuery = $request->input('search');
            $blogs->where('title', 'LIKE', "%{$searchQuery}%")
                ->orWhere('content', 'LIKE', "%{$searchQuery}%");
        }

        $user = auth()->user();
        $roles = $user->roles;
        
        if ($roles->contains('id', 1)) {
            $blogs = $blogs->orderByDesc('created_at')->paginate(5);
        } else {
            $blogs = $blogs->where('author_id', $user->id)->orderByDesc('created_at')->paginate(5);
        }

        return view('blogs.index', compact('blogs'));
    }


    public function create()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('blogs.create', ['content' => old('content')]);
    }

    public function store(StoreBlogRequest $request)
    {
        $input = $request->all();
        $input['author_id'] = auth()->user()->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'storage/blog-photos/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Blog::create($input);

        return redirect()->route('blogs.index')->with('success', "The blog post '{$request->title}' has been added successfully.");
    }

    public function show(Blog $blog)
    {
        // if(auth()->user()->id == 1){
        //     return view('blogs.show', compact('blog'));
        // } else {
        //     if($blog->author_id === auth()->id()){
        //         return view('blogs.show', compact('blog'));
        //     }else{
        //         abort(Response::HTTP_FORBIDDEN, '403 Forbidden | User Cannot View Blog');
        //     }
        // }
        // // abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    { 
        // Only admin can update all blogs
        
        if (auth()->user()->roles->contains('id', 1)) {
            return view('blogs.edit', compact('blog'));
        } else {
            if ($blog->author_id === auth()->id()) {
                return view('blogs.edit', compact('blog'));
            } else {
                abort(Response::HTTP_FORBIDDEN, '403 Forbidden |  Cannot the Blog');
            }
        }
        
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'storage/blog-photos/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
           
        $blog->update($input);
    
        return redirect()->route('blogs.index')->with('success', "The blog post has been updated successfully.");
    }

    public function destroy(Blog $blog)
    {
        if (auth()->user()->roles->contains('id', 1)) {
            // Admin can delete any blog
            $blog->delete();
        } else {
            // Allow user to delete his own blog
            abort_if($blog->author_id != auth()->id(), Response::HTTP_FORBIDDEN, 'Forbidden |  Could not delete blog');
            $blog->delete();
        }

        return redirect()->route('blogs.index')->with('destroyed', "The blog post '{$blog->title}' has been deleted successfully.");
    }
    
}
