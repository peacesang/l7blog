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
        Edit a post
    </div>
    <div class="card-body">
    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" name="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured_image"> Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category"> Select category</label>
                   <select name="category_id" class="form-control">
                       @foreach($categories as $category)
                   <option {{$post->category->id==$category->id? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="tags"> Select Tags:</label>
                    <br>
                    @foreach($tags as $tag)
                    <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}"
                        @foreach($post->tags as $t)
                            @if($tag->id==$t->id)
                            checked
                            @endif
                        @endforeach
                        
                        >{{$tag->tag}}
                        </label>
                    </div>
                    @endforeach 
            </div>
                <div class="form-group">
                    <label for="content"> Content</label>
                <textarea type="textarea" name="content" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">update Post</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection