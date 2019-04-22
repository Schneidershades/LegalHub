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


      <div class="row">
        <div class="col-lg-12">
          <div class="card-deck">
            <div class="card bg-danger">
              <img class="card-img-top" src="{{URL::to('assets/images/gallery/19.jpg')}}" alt="Card image cap">
              <div class="card-body text-white">
                <h5 class="card-title text-white">Business Registration</h5>
                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                <a href="{{route('business.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
              </div>
            </div>
            <div class="card bg-success">
              <img class="card-img-top" src="{{URL::to('assets/images/gallery/21.jpg')}}" alt="Card image cap">
              <div class="card-body text-white">
                <h5 class="card-title text-white">Company Registration</h5>
                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                <a href="{{route('company.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
              </div>
            </div>
            <div class="card bg-dark">
              <img class="card-img-top" src="{{URL::to('assets/images/gallery/25.jpg')}}" alt="Card image cap">
              <div class="card-body text-white">
                <h5 class="card-title text-white">Ngo Registration</h5>
                <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
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
                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                <a href="{{route('patent.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
              </div>
            </div>
            <div class="card bg-warning">
              <img class="card-img-top" src="{{URL::to('assets/images/gallery/24.jpg')}}" alt="Card image cap">
              <div class="card-body text-white">
                <h5 class="card-title text-white">Trademark Registration</h5>
                <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                <a href="{{route('trademark.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
              </div>
            </div>

            <div class="card bg-danger">
              <img class="card-img-top" src="{{URL::to('assets/images/gallery/22.jpg')}}" alt="Card image cap">
              <div class="card-body text-white">
                <h5 class="card-title text-white">Copyright Registration</h5>
                <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                <a href="{{route('copyright.create')}}"> <button class="card-text"><small>Register Now</small></button></a>
              </div>
            </div>
          </div>
        </div>
      </div>


    
    <!-- <div class="card-group">
       <div class="card border-right">
          <div class="card-header">
              Sales This Week
        <div class="card-action">
         <div class="dropdown">
         <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
          <i class="icon-options"></i>
         </a>
            <div class="dropdown-menu animated fadeIn dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void();">Action</a>
            <a class="dropdown-item" href="javascript:void();">Another action</a>
            <a class="dropdown-item" href="javascript:void();">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void();">Separated link</a>
           </div>
          </div>
                 </div>
            </div>
          <div class="card-body">
            <canvas id="dash-chart-16" height="180"></canvas>
          </div>
          <ul class="list-group list-group-flush list shadow-none">
            <li class="list-group-item d-flex justify-content-between align-items-center">Drips <span class="badge gradient-purpink text-white badge-pill shadow">50</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Apple <span class="badge gradient-orange
             text-white badge-pill shadow">50</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Nokia <span class="badge gradient-meridian text-white badge-pill">50</span></li>
          </ul>
        </div>
    <div class="card border-right">
          <div class="card-header">
              Profit Ratio
        <div class="card-action">
         <div class="dropdown">
         <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
          <i class="icon-options"></i>
         </a>
            <div class="dropdown-menu animated fadeIn dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void();">Action</a>
            <a class="dropdown-item" href="javascript:void();">Another action</a>
            <a class="dropdown-item" href="javascript:void();">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void();">Separated link</a>
           </div>
          </div>
                 </div>
            </div>
          <div class="card-body">
            <canvas id="dash-chart-17" height="180"></canvas>
          </div>
          <ul class="list-group list-group-flush list shadow-none">
            <li class="list-group-item d-flex justify-content-between align-items-center">Gross Profit <span class="badge gradient-quepal text-white badge-pill shadow">05</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Revenue <span class="badge gradient-violet
             text-white badge-pill shadow">08</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Expense <span class="badge gradient-ibiza text-white badge-pill shadow">07</span></li>
          </ul>
        </div>
    <div class="card">
          <div class="card-header">
              Trending Products
        <div class="card-action">
         <div class="dropdown">
         <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
          <i class="icon-options"></i>
         </a>
            <div class="dropdown-menu animated fadeIn dropdown-menu-right">
            <a class="dropdown-item" href="javascript:void();">Action</a>
            <a class="dropdown-item" href="javascript:void();">Another action</a>
            <a class="dropdown-item" href="javascript:void();">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void();">Separated link</a>
           </div>
          </div>
                 </div>
            </div>
          <div class="card-body">
            <canvas id="dash-chart-18" height="180"></canvas>
          </div>
          <ul class="list-group list-group-flush list shadow-none">
            <li class="list-group-item d-flex justify-content-between align-items-center">Jeans <span class="badge gradient-knight text-white badge-pill shadow">25</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">T-Shirts <span class="badge gradient-dusk
             text-white badge-pill shadow">25</span></li>
            <li class="list-group-item d-flex justify-content-between align-items-center">Shoes <span class="badge gradient-yoda text-white badge-pill shadow">25</span></li>
          </ul>
        </div>
    </div> -->
    

@endsection