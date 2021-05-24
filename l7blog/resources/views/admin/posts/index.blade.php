@extends('layouts.app')

@section('content')

<table class="table table-hover">
    <thead>
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
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
                <form action="{{route('posts.destroy',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Trash">
                </form>
        </td> 
        
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection