
@extends('layouts.app')
@section('title','Create Employee')
@section('content')
 <div class="row mt-5">
   <div class="col-sm-8 offset-sm-2">
     <form action="{{route('employees.store')}}" method = "post">
       @csrf
       <div class="form-group">
         <label for="name">Firstname:</label>
         <input type="text" name = "name" id = "name" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="lastname">Lastname:</label>
         <input type="text" name = "lastname" id = "lastname" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="company">Company:</label>
         <input type="text" name = "company" id = "company" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" name = "email" id = "email" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="phone">Phone Number:</label>
         <input type="text" name = "phone" id = "phone" class="form-control" required>
       </div>
       <button type = "submit" class = "btn btn-success">Submit</button>
     </form>
   </div>
 </div>
@endsection
