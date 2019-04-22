@extends('layouts.admin')

@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">All Company Registration </h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Company Registration</li>
     </ol>
    </div>
    <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('company.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create New Company Registration Here</button></a>
      </div>
    </div>
</div>
<!-- End Breadcrumb-->

@include('backend.partials._errors')




@endsection

@section('scripts')

@include('backend.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('backend.partials._datatablescss')
@endsection
