@extends('layouts.app')
@section('title','Users Index')
@section('content')
<div class="row">
<div class="col-sm-12">
  <h2>  Welcom dear {{Auth::user()->name }}! You are logged in.</h2>
</div>
</div>

@if(Auth::user()->id == 1)
  <div class="row">
    <caption>List of users</caption>
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>

        </tr>
        @foreach($errors as $user)
          <tr class = "text-center">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{route('user.destroy',['id'=>$user->id])}}" class = "btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
    @endif
@endsection
