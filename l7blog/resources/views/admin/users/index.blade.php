@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center">View all Users</div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Permission</th>
       
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if(!$users->count()>0)
        <tr><th class="text-center" colspan="4">No Users Created</th></tr>
      @endif
        @foreach($users as $user)
      <tr>
        <td><img class="img-fluid" width="100px" src="{{asset($user->profile->avatar)}}"></td>
        <td>{{$user->name}}</td>
        <td>
            @if($user->admin)
            <a href="{{route('users.not.admin',$user->id)}}" class="btn btn-xs btn-danger">remove permission</a>
            @else
        <a href="{{route('users.admin',$user->id)}}" class="btn btn-xs btn-success">make admin</a>
            @endif
        
        </td>
       
        <td>
          @if(Auth::id() !==$user->id)
          <form action="{{route('users.destroy',$user->id)}}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" class="btn btn-danger" value="Delete">
          </form>
          @endif
                
        </td> 
        
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection