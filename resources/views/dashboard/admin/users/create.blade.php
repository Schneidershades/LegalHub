@extends('layouts.admin')
@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropzone.css')}}"/> -->
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/> -->
@endsection
@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Create User</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
        </ol>
    </div>
    <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
        </div>
    </div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
<div class="col-lg-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create User </div>
            <hr>
            <form class="color-form" method="POST" action="{{route('user.store')}}" >
                @csrf
                <div class= "form-group row">
                    
                    <div class="col-md-12">
                        <label for="input-13">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-rounded"  required/>
                    </div>

                    <div class="col-md-12">
                        <label for="input-13">Email</label>
                        <input type="email" name="email" class="form-control form-control-rounded"  required/>
                    </div>

                    
                    <div class="col-md-12">
                        <label for="input-13">Password</label>
                        <input type="password" name="password" class="form-control form-control-rounded"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Save User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
