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
                    <label for="title"> Featured image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title"> Content</label>
                    <textarea type="textarea" name="content" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Store Post</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection