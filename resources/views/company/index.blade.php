@extends('layouts.app')
@section('title','Company Index')
@section('content')

<div class="row">

  <a href="{{route('company.create')}}" class = "btn btn-info">Create</a>
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
            <td><a href="{{route('company.edit',$company->id)}}" class = "btn btn-info">Edit</a></td>
            <td>
              <!-- <a href="{{route('company.destroy',$company->id)}}" class = "btn btn-danger">Delete</a> -->
              <form id="destroy-form" action="{{ route('company.destroy', $company->id) }}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete">
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$companyes->links()}}
  </div>
@endsection
