@extends('layouts.admin')

@section('content')
	@include('dashboard.partials._errors')



@endsection

@section('scripts')

@include('dashboard.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('dashboard.partials._datatablescss')
@endsection
