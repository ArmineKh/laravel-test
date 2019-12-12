@extends('layouts.app')
@section('title','Company Index')
@section('content')

<div class="row">
  <a href="{{url('compCreate')}}" class = "btn btn-info">Create</a>
</div>
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <caption>List of companeis</caption>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Web site</th>
        </tr>
        @foreach($companyes as $company)
          <tr class = "text-center">
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td> <img src="{{$company->logo}}" alt="Company logo" height="50" width="50"></td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td><a href="{{route('company.edit',['id'=>$company->id])}}" class = "btn btn-info">Edit</a></td>
            <td><a href="{{route('company.destroy',['id'=>$company->id])}}" class = "btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$companyes->links()}}
  </div>
@endsection