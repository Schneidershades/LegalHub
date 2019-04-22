@extends('layouts.admin')

@section('content')
	 <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Role Discounts </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-discount"><a href="javaScript:void();">LegalHub</a></li>
            <li class="breadcrumb-discount"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-discount active" aria-current="page">All Role Discounts</li>
         </ol>
	   </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('discount.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create Service Details</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
	@include('backend.partials._errors')

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Service Discount Users
              <!-- <span class=""><button type="submit" class="btn btn-link bg-success text-info shadow px-5"><i class="icon-lock"></i> Register</button></span> -->
            </div>

            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Users Role</th>       
                        <th>Discounts</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                          @if($role->discounts->count() > 0)
                            @foreach($role->discounts as $discount)
                              {{$discount->item->name}} : {{$discount->percentage}}%<br> 
                            @endforeach
                          @else
                            <p>No Discounts Available</p>
                          @endif</td>
                        <td>
                          <a href="{{route('role.edit', $role->id)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                          <!-- <a href="{{route('role.show', $role->id)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a> -->
                          <a href="{{route('role.destroy', $role->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Users</th>
                        <th>Discounts</th>
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
