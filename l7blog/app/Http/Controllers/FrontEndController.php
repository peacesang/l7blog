<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index')
        ->with('website',Setting::first())
        ->with('categories',Category::take(5)->get())
        ->with('first_post',Post::orderBy('created_at','desc')->first())
        ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
        ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
        ->with('career',Category::find(10))
        ->with('tutorials',Category::find(13));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    public function singlePost($slug)
    {
        //
        $post=Post::where('slug',$slug)->first();

        $next_id=Post::where('id', '>' , $post->id)->min('id');
        $prev_id=Post::where('id', '<', $post->id)->max('id');

        return view('single')->with('post',$post)
                            ->with('website',Setting::first())
                            ->with('categories',Category::take(5)->get())
                            ->with('next', Post::find($next_id))
                            ->with('prev', Post::find($prev_id))
                            ->with('tags',Tag::all());
    }

    public function category($id)
    {
        $category=Category::find($id);

        return view('category')->with('category',$category)
                                ->with('website',Setting::first())
                                ->with('categories',Category::take(5)->get());
    }

    public function tag($id)
    {
        $tag=Tag::find($id);

        return view('tag')->with('tag',$tag)
                                ->with('website',Setting::first())
                                ->with('categories',Category::take(5)->get());
    }

    public function result(Request $request)
    {
        //
        // $posts=Post::where('title','like', '%' . $request->query . '%')->get();
        $query=request('query');
       

        
       

        $posts = Post::where('title', 'LIKE', "%$query%")
        ->latest()
        ->get();

        

        return view('results')->with('posts',$posts)
                                // ->with('title','Search results:'.$request->query)
                                ->with('categories',Category::take(5)->get())
                                ->with('website',Setting::first())
                                ->with('query',$query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
