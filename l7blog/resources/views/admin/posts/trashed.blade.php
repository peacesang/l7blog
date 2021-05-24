@extends('layouts.app')

@section('content')

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
    </tbody>
  </table>


@endsection