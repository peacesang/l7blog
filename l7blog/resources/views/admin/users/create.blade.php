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
        Create a user
    </div>
    <div class="card-body">
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"> User</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title"> Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                 
                
                          
                                    
                     
               
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Add User</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection