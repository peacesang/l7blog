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
        Edit Blog setting
    </div>
    <div class="card-body">
    <form action="{{route('settings.update',$settings->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="Site_name"> Site name</label>
                <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Setting_address"> Setting Address</label>
                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_phone"> Contact phone</label>
                <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email"> Contact email</label>
                <input type="text" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
                </div>
                 
                
                          
                                    
                     
               
                <div class="form-group">
                       <div class="text-center">
                           <button class="btn btn-success" type="submit">Update Site Settings</button>
                       </div>
                </div>
            </form>
    </div>
</div>

@endsection