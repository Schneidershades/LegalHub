@extends('layouts.admin')
@section('content')
@include('dashboard.partials._errors')
<div class="row mt-3">
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-info border-left-sm">
            <div class="card-body">
                <div class="media">
                    <div class="media-body text-left">
                        <h5 class="text-info">{{ $user->registrationTransactions()->count() }}</h5>
                        <span>Total Orders</span>
                    </div>
                    <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
                        <i class="icon-basket-loaded text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-3">
        <div class="card border-danger border-left-sm">
            <div class="card-body">
                <div class="media">
                    <div class="media-body text-left">
                        <h5 class="text-danger">
                            N{{$user->registrationTransactions()->sum('amount')}}
                        </h5>
                        <span>Total Order</span>
                    </div>
                    <div class="align-self-center w-circle-icon rounded-circle gradient-bloody">
                        <i class="icon-wallet text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> {{$user->name}}</div>
                <hr>
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="input-9">Full Name</label><br>
                        <b>{{$user->name}}</b>
                    </div>
                    <div class="col-md-3">
                        <label for="input-9">Amount</label><br>
                        <b>{{$user->email}}</b>
                    </div>
                    <div class="col-md-3">
                        <label for="input-9">ACTIVE</label><br>
                        <span class="badge badge-danger m-1">{{$user->active}}</span>
                    </div>
                </div>
                <br><br>		
                <div class="form-group row">
                    <div class="col-sm-10">
                        <a href="{{route('user.edit', $user->id)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit user Details</a>
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