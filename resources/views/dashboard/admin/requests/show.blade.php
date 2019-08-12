
@extends('layouts.admin')
@section('content')
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Request Detail</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Request Detail</li>
        </ol>
    </div>
</div>
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Request services</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input-13">Name</label>
                        <h6>{{$service->name}}</h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-13">Email</label>
                        <p>{{$service->email}}</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-13">Phone Number</label>
                        <h6>{{$service->phone}}</h6>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-13">Comment</label>
                        <p>{{$service->comment}}</p>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('dashboard.partials._datatablesjs')
@endsection
@section('stylesheets')
@include('dashboard.partials._datatablescss')
@endsection