<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Symfony\Component\HttpFoundation\Session\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    function index(){
        return view('home')->with('posts' ,Post::simplePaginate(3))
        ->with('tags' , Tag::get(['id' , 'name']));

        // $posts = Post::where('published','1')->paginate(6);
        // return view('home')->with('posts', $posts);
    }



    function show($id ){
        return view('post')->with('posts' ,Post::find($id)) ;
    }


    public function store(Request $request, $id) {

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $id;
        $comment->save();
        return redirect('home');
    }








    // function lang(Request $request, $locale){

    //     $locale = App::currentLocale();
    //     $request->session()->put('lang', $locale);
    //     Session::put('lang', $locale);
    //     return redirect()->back();
    // }
}
