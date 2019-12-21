@extends('layouts.app')
@section('title','Edit Employee')
@section('content')

  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <form action="{{route('employees.update', $employee->id)}}" method = "POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="name">Firstname:</label>
          <input type="text" name = "name" id = "name" class="form-control" required value = "{{$employee->name}}">
        </div>
        <div class="form-group">
          <label for="lastname">Lastname:</label>
          <input type="text" name = "lastname" id = "lastname" class="form-control" required value = "{{$employee->lastname}}">
        </div>
        <div class="form-group">
          <label for="company">Company:</label>
          <input type="text" name = "company" id = "company" class="form-control" required value = "{{$employee->company}}">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name = "email" id = "email" class="form-control" required value = "{{$employee->email}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="text" name = "phone" id = "phone" class="form-control" required value = "{{$employee->phone}}">
        </div>
        <input type="hidden" name="id" value = "{{$employee->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection
