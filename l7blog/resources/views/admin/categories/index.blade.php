@extends('layouts.app')

@section('content')

<table class="table table-hover">
    <thead>
      <tr>
        <th>Category name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
      <tr>
        <td>{{$category->name}}</td>
        <td><a class="btn btn-primary" href="{{route('categories.edit',$category->id)}}">edit</a></td>
        <td>
                <form action="{{route('categories.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
        </td> 
        
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection