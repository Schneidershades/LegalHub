@extends('layouts.admin')

@section('content')
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
  <h4 class="page-title">All Content Subscribers </h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Content Subscribers </li>
   </ol>
</div>
</div>
@include('dashboard.partials._errors')


<div class="row">
  <div class="col-md-12 mx-auto">
    <div class="card">
      <div class="card-body">
        <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Content Subscribers </div>
        <hr>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered">
              <thead>
                  <tr>
                      <th>Email</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach($subscribers as $subscriber)
                  <tr>
                      <td>{{ $subscriber->email }}</td>
                      <td>{{ $subscriber->subscribe ? $subscriber->subscribe : 'Deactivate' }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
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