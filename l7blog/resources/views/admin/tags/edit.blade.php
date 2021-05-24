@extends('layouts.app')

@section('content')


<div class="card">
        @include('admin.includes.errors')

    <div class="card-header">
        update a tag
    </div>
    <div class="card-body">
    <form action="{{route('tags.update',$tag->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
           
            
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" value="{{$tag->tag}}" name="tag" class="form-control">
                </div>
                
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Update Tag</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection