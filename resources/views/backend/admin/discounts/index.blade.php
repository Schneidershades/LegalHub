@extends('layouts.admin')

@section('content')
	 <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Users Special Discount</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-discount"><a href="javaScript:void();">LegalHub</a></li>
            <li class="breadcrumb-discount"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-discount active" aria-current="page">All Users Special Discount</li>
         </ol>
	   </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('discount.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create User Special Discount</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
	@include('backend.partials._errors')

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Service Discount Users</div>

            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Users</th>
                        <th>User Discounts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                          @if($user->discounts->count() > 0)
                            @foreach($user->discounts as $discount)
                              {{$discount->item->name}} : {{$discount->percentage}}%<br>
                            @endforeach
                          @else
                            <p>No Discounts Available</p>
                          @endif
                        </td>
                        <td>
                          <!-- <a href=""><i aria-hidden="true" class="fa fa-eye"></i></a> -->
                          <a href=""><i aria-hidden="true" class="fa fa-edit"></i></a>
                          <a href=""><i aria-hidden="true" class="zmdi zmdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Users</th>
                        <th>User Discounts</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->





@endsection

@section('scripts')

@include('backend.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('backend.partials._datatablescss')
@endsection
