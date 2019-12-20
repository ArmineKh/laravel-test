@extends('layouts.app')
@section('title','Employees Index')
@section('content')
<div class="row">
  <a href="{{route('employees.create')}}" class = "btn btn-info pull-left ">Create</a>
</div>
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <caption>List of Employees</caption>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Company</th>
          <th>Email</th>
          <th>Phone No.</th>
        </tr>
        @foreach($employees as $employee)
          <tr class = "text-center">
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->lastname }}</td>
            <td>{{ $employee->company }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td><a href="{{route('employees.edit',$employee->id)}}" class = "btn btn-info">Edit</a></td>
            <td>
              <form id="destroy-form" action="{{ route('employees.destroy', $employee->id) }}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-danger" value="Delete">
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    {{$employees->links()}}

  </div>
@endsection
