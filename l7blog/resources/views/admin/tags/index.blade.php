@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center">View all Tags</div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Tag name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if(!$tags->count()>0)
          <tr><th class="text-center" colspan="3">No tags Created</th></tr>
        @endif
        @foreach($tags as $tag)
      <tr>
        <td>{{$tag->tag}}</td>
        <td><a class="btn btn-primary" href="{{route('tags.edit',$tag->id)}}">edit</a></td>
        <td>
                <form action="{{route('tags.destroy',$tag->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
        </td> 
        
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection