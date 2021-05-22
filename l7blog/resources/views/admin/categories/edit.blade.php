@extends('layouts.app')

@section('content')


<div class="card">
        @include('admin.includes.errors')

    <div class="card-header">
        update a category
    </div>
    <div class="card-body">
    <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
           
            
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" value="{{$category->name}}" name="name" class="form-control">
                </div>
                
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Update Category</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection