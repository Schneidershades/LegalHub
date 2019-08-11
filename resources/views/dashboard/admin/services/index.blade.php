@extends('layouts.admin')

@section('content')
	 <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">All Registered Service Items </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Service Items</li>
         </ol>
	   </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('service.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create Service Details</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
	@include('dashboard.partials._errors')

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Service Items
              <!-- <span class=""><button type="submit" class="btn btn-link bg-success text-info shadow px-5"><i class="icon-lock"></i> Register</button></span> -->
            </div>

            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>User</th>
                        <th>Flexible</th>
                        <th>Flexible Amount</th>
                        <th>Flexible State</th>
                        <th>Created</th>
                        <th>Modified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->item->name}}</td>
                        <td>{{$item->amount}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->flexible}}</td>
                        <td>{{$item->flexible_amount}}</td>
                        <td>{{$item->flexible_state}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                          <!-- <a href=""><i aria-hidden="true" class="fa fa-eye"></i></a> -->
                          <a href="{{route('service.edit', $item->id)}}"><i aria-hidden="true" class="fa fa-edit"></i></a>
                          <a href=""><i aria-hidden="true" class="zmdi zmdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>User</th>
                        <th>Flexible</th>
                        <th>Flexible Amount</th>
                        <th>Flexible State</th>
                        <th>Created</th>
                        <th>Modified</th>
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

@include('dashboard.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('dashboard.partials._datatablescss')
@endsection
