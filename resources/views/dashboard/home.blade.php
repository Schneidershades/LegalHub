@extends('layouts.admin')

@section('content')
<div class="row mt-3">
  <div class="col-12 col-lg-6 col-xl-3">
    <div class="card border-info border-left-sm">
      <div class="card-body">
        <div class="media">
        <div class="media-body text-left">
        <h5 class="text-info">{{ auth()->user()->registrationTransactions()->count() }}</h5>
          <span>Total Orders</span>
        </div>
        <div class="align-self-center w-circle-icon rounded-circle gradient-scooter">
          <i class="icon-basket-loaded text-white"></i></div>
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
            N{{auth()->user()->registrationTransactions()->sum('amount')}}
          </h5>
          <span>Total Order</span>
        </div>
         <div class="align-self-center w-circle-icon rounded-circle gradient-bloody">
          <i class="icon-wallet text-white"></i></div>
      </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-3">
    <div class="card border-success border-left-sm">
      <div class="card-body">
        <div class="media">
        <div class="media-body text-left">
          <h4 class="text-success">{{$user_has_paid}}</h4>
          <span>Total Paid</span>
        </div>
        <div class="align-self-center w-circle-icon rounded-circle gradient-quepal">
          <i class="icon-pie-chart text-white"></i></div>
      </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-6 col-xl-3">
    <div class="card border-warning border-left-sm">
      <div class="card-body">
        <div class="media">
        <div class="media-body text-left">
          <h4 class="text-warning">{{$user_has_discount}}</h4>
          <span>Service Discounts</span>
        </div>
        <div class="align-self-center w-circle-icon rounded-circle gradient-blooker">
          <i class="icon-user text-white"></i></div>
      </div>
      </div>
    </div>
  </div>
</div>


<!-- <div class="row">
  <div class="col-lg-12">
    <div class="card-deck">
      <div class="card bg-danger">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/19.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Business Registration</h5>
          <a href="{{route('business.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>
      <div class="card bg-success">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/21.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Company Registration</h5>
          <a href="{{route('company.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>
      <div class="card bg-dark">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/25.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Ngo Registration</h5>
          <a href="{{route('ngo.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="card-deck">
      <div class="card bg-info">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/23.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Patent Registration</h5>
          <a href="{{route('patent.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>
      <div class="card bg-warning">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/24.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Trademark Registration</h5>
          <a href="{{route('trademark.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>

      <div class="card bg-danger">
        <img class="card-img-top" src="{{URL::to('assets/images/gallery/22.jpg')}}" alt="Card image cap">
        <div class="card-body text-white">
          <h5 class="card-title text-white">Copyright Registration</h5>
          <a href="{{route('copyright.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
        </div>
      </div>
    </div>
  </div>
</div>
 -->

@endsection