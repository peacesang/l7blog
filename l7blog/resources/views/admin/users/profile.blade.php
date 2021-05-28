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
        Edit your profile
    </div>
    <div class="card-body">
    <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title"> Username</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="title"> Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="title"> New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar"> Upload new avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>      
                <div class="form-facebook">
                    <label for="title"> Facebook profile</label>
                    <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="youtube"> Youtube profile</label>
                    <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
                </div>
                <div class="form-group">
                    <label for="about"> About</label>
                    <textarea name="about" cols="6" rows="6" class="form-control" >{{$user->profile->about}}</textarea>
                   
                </div>
                          
                                    
                     
               
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Update User Profile</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection