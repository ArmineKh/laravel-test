
@extends('layouts.app')
@section('title','Create Company')
@section('content')
 <div class="row mt-5">
   <div class="col-sm-8 offset-sm-2">
     <form action="{{route('company.store')}}" method = "post" enctype="multipart/form-data">
       @csrf

       <div class="form-group">
         <label for="name">Nname:</label>
         <input type="text" name = "name" id = "name" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="email">Email:</label>
         <input type="email" name = "email" id = "email" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="logo">Logo:</label>
         <input id="logo" type="file" class="form-control" name="logo">
       </div>
       <div class="form-group">
         <label for="website">Web site:</label>
         <input type="text" name = "website" id = "website" class="form-control" required>
       </div>
       <button type = "submit" class = "btn btn-success">Submit</button>
     </form>
   </div>
 </div>
@endsection
