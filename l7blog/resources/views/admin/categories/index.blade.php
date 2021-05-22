@extends('layouts.app')

@section('content')

<table class="table table-hover">
    <thead>
      <tr>
        <th>Category name</th>
        <th>Editing</th>
        <th>Deleting</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
      <tr>
        <td>{{$category->name}}</td>
        <td>edite</td>
        <td>delete</td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection