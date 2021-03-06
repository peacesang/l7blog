@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header text-center">View all Categories</div>
</div>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Category name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @if(!$categories->count()>0)
          <tr><th class="text-center" colspan="3">No categories Created</th></tr>
        @endif
        @foreach($categories as $category)
      <tr>
        <td>{{$category->name}}</td>
        <td><a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">edit</a></td>
        <td>
                <form action="{{route('categories.destroy',$category->id)}}" method="post">
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