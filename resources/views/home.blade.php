
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif



                    <div class="container">
                        Welcom! You are logged in.
                    </div>
                    @if(Auth::user()->id == 1)
                    <div class="container">
                      <div class="row">
                        <a class = "btn " href="#">All users</a>
                      </div>
                      <div class="row">
                        <a class = "btn " href="#">All employeis</a>
                      </div>
                      <div class="row">
                        <a class = "btn " href="#">All companeis</a>
                      </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
