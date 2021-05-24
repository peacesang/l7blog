@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center">View all Trashed Posts</div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if($posts->count()>0)

      @foreach($posts as $post)
        <tr>
          <td><img class="img-fluid" width="100px" src="{{$post->featured}}"></td>
          <td>{{$post->title}}</td>
          <td><a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">edit</a></td>
          <td>
                  <a href="{{route('posts.restore',$post->id)}}" class="btn btn-success">Restore</a>
          </td> 
          <td>
              <a href="{{route('posts.kill',$post->id)}}" class="btn btn-danger">Delete</a>
          </td> 
          
        </tr>
      @endforeach

      @else
      <tr><th class="text-center" colspan="5">No trashed posts</th></tr>

      @endif
        
    </tbody>
  </table>


@endsection