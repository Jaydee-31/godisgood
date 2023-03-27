<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Requests\DeleteBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    // public function index()
    // {
    //     // abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     // $blogs = Blog::all();

    //     // return view('blogs.index', compact('blogs'));

    //     if(auth()->user()->id == 1){
    //         $blogs = Blog::orderByDesc('created_at')->paginate(5);
    //     } else {
    //         $blogs = Blog::where('author_id', auth()->id())->orderByDesc('created_at')->paginate(5);
    //     }
        
    //     return view('blogs.index', compact('blogs'));
        
    // }
    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $roles = $user->roles;
        
        if ($roles->contains('id', 1)) {
            $blogs = Blog::orderByDesc('created_at')->paginate(5);
        } else {
            $blogs = Blog::where('author_id', $user->id)->orderByDesc('created_at')->paginate(5);
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
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        // ]);
   
        $input = $request->all();
        $input['author_id'] = auth()->user()->id;

   
        if ($image = $request->file('image')) {
            $destinationPath = 'storage/blog-photos/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Blog::create($input);
        
        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'image' => 'required',
        // ]);

        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $request['image'] = "$profileImage";
        // }
        // $blog = Blog::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'image' => $request->image,
        //     'author_id' => auth()->user()->id,
        // ]);

        // // Blog::create($request->validated());

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
        if(auth()->user()->id == 1){
            return view('blogs.edit', compact('blog'));
        } else {
            if($blog->author_id === auth()->id()){
                return view('blogs.edit', compact('blog'));
            }else{
                abort(Response::HTTP_FORBIDDEN, '403 Forbidden |  Cannot the Blog');
            }
        }
        // abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
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
        // $blog->update([
        //     'title' => $request->input('title'),
        //     'content' => $request->input('content'),
        // ]);
    
        return redirect()->route('blogs.index')->with('success', "The blog post has been updated successfully.");
        // $blog->update($request->validated());

        // return redirect()->route('blogs.index');
    }

    public function destroy(Blog $blog)
    {
        // abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden | User Cannot Delete a Blog');

        // $blog->delete();

        // return redirect()->route('blogs.index');

        if(auth()->user()->id == 1){
            // Admin can delete any blog
            $blog->delete();
        } else {
            abort_if($blog->author_id != auth()->id(), Response::HTTP_FORBIDDEN, 'Forbidden |  Could not delete blog');
            $blog->delete();
        }
        // else{
        //     // User can only delete their own blog
        //     if($blog->author_id === auth()->id()){
        //         $blog->delete();
        //     }else{
        //         abort(Response::HTTP_FORBIDDEN, '403 Forbidden | User Cannot Delete a Blog');
        //     }
        // }

        return redirect()->route('blogs.index')->with('destroyed', "The blog post '{$blog->title}' has been deleted successfully.");
    }
    
}
