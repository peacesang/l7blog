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
        Create a category
    </div>
    <div class="card-body">
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" name="name" class="form-control">
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