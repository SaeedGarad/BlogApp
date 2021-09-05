<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('admin.posts')->with('posts' , Post::paginate(2));
    // }
    public function index()
    {
        // $posts = Post::get();
        // $posts = [];
        if (Auth::user()->is_admin) {
            $posts = Post::paginate(5);
        }
        else {
            $posts = Post::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('admin.posts',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createPost')->with('tags' , Tag::get(['id', 'name']))
        ->with('categories' , Category::get(['id', 'name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
        ]);

       $post  = new Post();
       $post->title=$request->title;
       $post->body=$request->body;
       $post->author=$request->author;
       $post->user_id = Auth::user()->id;
       $post->category_id = $request->category_id;
       $post->published = 1;
       $post->save();
       $post->tags()->attach($request->tag_id);

       return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return view('admin.showPost')->with('posts' ,$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.editPost')->with('post',$post)
        ->with('tags',Tag::get(['id' , 'name']))
        ->with('categories' , Category::get(['id', 'name']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->body=$request->body;
        $post->author=$request->author;

        $post->category_id = $request->category_id;
        // $post->published = $request->published;
        $post->save();
        $post->tags()->sync($request->tag_id);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect('/admin/posts');
    }

    public function publish(Post $post)
    {
        $post->published = !$post->published;
        $post->save();
        return redirect('/admin/posts');
    }
}
