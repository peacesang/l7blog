@extends('layouts.app')

@section('content')


<div class="card">
   @include('admin.includes.errors')

    <div class="card-header">
        Create a Tag
    </div>
    <div class="card-body">
    <form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Store Category</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection