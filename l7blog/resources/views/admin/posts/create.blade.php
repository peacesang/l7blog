@extends('layouts.app')

@section('content')


<div class="card">
    @if(count($errors)>0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error}}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="card-header">
        create a post
    </div>
    <div class="card-body">
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured_image"> Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category"> Select category</label>
                   <select name="category_id" class="form-control">
                       @foreach($categories as $category)
                   <option value="{{$category->id}}"  >{{$category->name}}</option>
                       @endforeach
                   </select>
                </div>
                
              
                <div class="form-group">
                        <label for="tags"> Select Tags:</label>
                        <br>
                        @foreach($tags as $tag)
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
                            </label>
                        </div>
                        @endforeach 
                </div>
               
                      
                      
                <div class="form-group">
                    <label for="content"> Content</label>
                    <textarea id="summernote"  type="textarea" name="content" cols="10" rows="10" class="form-control"></textarea>
                </div>
                <div id="summernote">dfgd</div>
                <textarea class="form-control" name="summernote" id="summernote"></textarea>


                
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Store Post</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection


