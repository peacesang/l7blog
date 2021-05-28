<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
        
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
            'name'=>'required',            
        ]);

        // dd($request->all());
        $category=new Category;
        $category->name=$request->name;
        $category->save();
        Session::flash('success', 'Category created successfully');
        toastr()->success('Category created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        //dd($category->id);
        $category=Category::find($category->id);

        //dd($category);

        return view('admin.categories.edit')->with('category',$category);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category=Category::find($category->id);
        $category->name=$request->name;
        $category->update();
        Session::flash('success', 'Category updated successfully');
        toastr()->success('Category updated successfully');

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category=Category::find($category->id);
        
        foreach($category->posts as $post)
        {
            $post->forcedelete();
        }
     
        $category->destroy($category->id);

        Session::flash('success', 'Category deleted successfully');
        toastr()->success('Category deleted successfully');
         return redirect()->route('categories.index');
    }
}
