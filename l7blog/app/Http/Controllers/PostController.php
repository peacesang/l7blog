<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();

        $tags=Tag::all();
        if($categories->count()==0 || $tags->count()==0)
        {
            toastr()->info('You must some tags or category to create post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all());
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
        $this->validate($request, [
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required',
            

        ]);
        //dd($request);
        $featured=$request->featured;

        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        
        $post=new Post;

        $post=Post::create([
           'title'=>$request->title,
           'content'=>$request->content,
           'featured'=>'uploads/posts/' . $featured_new_name,
           'category_id'=> $request->category_id, 
           'slug'=>Str::slug($request->title)
        ]);
            $post->tags()->attach($request->tags);
       
        toastr()->success('Category created successfully');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $post=Post::find($post->id);

       // dd($post);

      return view('admin.posts.edit')->with('post',$post)->with('categories', Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->validate($request, [
            'title'=>'required',           
            'content'=>'required',
            'category_id'=>'required',           

        ]);

            $post=Post::find($post->id);
            

        if($request->hasFile('featured'))
        {
            $featured=$request->featured;

            $featured_new_name=time().$featured->getClientOriginalName();
            

            $post->featured=$featured->move('uploads/posts', $featured_new_name);
        }
        
        
        


        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;

        $post->save();
        
        toastr()->success('Posts updated successfully');
         return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post=Post::find($post->id);
        $post->destroy($post->id);

        
        toastr()->success('Posts trashed successfully');
         return redirect()->route('posts.index');
        
    }

    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        //dd($posts);
        
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id)
    {
        $post=Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        //dd($post);
        toastr()->success('Posts permanently deleted successfully');
        return redirect()->back();

    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        toastr()->success('Posts restored successfully');
        return redirect()->route('posts.index');


    }
}
