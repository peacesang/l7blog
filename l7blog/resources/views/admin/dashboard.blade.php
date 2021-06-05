@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-info text-center">
              Published Post
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">{{$post_count}}</h5>          
            </div>
          </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-danger text-center">
              Trashed Post
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">{{$trash_count}}</h5>          
            </div>
          </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-success text-center">
              Users 
            </div>
            <div class="card-body ">
              <h5 class="card-title text-center">{{$user_count}}</h5>          
            </div>
          </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-info text-center">
              Categories
            </div>
            <div class="card-body">
            <h5 class="card-title text-center">{{$category_count}}</h5>          
            </div>
          </div>
    </div>
</div>
@endsection
