@extends('layouts.admin')
@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">All Registered Users </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-discount"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-discount"><a href="javaScript:void()">Dashboard</a></li>
            <li class="breadcrumb-discount active" aria-current="page">All Service Users</li>
        </ol>
    </div>
    <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <a href="{{route('user.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create Admin</button></a>
        </div>
    </div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-table"></i> Users
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Users</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row-->
@endsection
@section('scripts')
@include('dashboard.partials._datatablesjs')
@endsection
@section('stylesheets')
@include('dashboard.partials._datatablescss')
@endsection