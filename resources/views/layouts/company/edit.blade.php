@extends('layouts.app')
@section('title','Edit Employee')
@section('content')

  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('company.update')}}" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name = "name" id = "name" class="form-control" required value = "{{$company->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name = "email" id = "email" class="form-control" required value = "{{$company->email}}">
        </div>
        <div class="form-group">
          <label for="logo">Logo:</label>
          <input id="logo" type="file" class="form-control" name="logo">
        </div>

        <div class="form-group">
          <label for="website">Web site:</label>
          <input type="text" name = "website" id = "website" class="form-control" required value = "{{$company->website}}">
        </div>
        <input type="hidden" name="id" value = "{{$company->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
