@extends('layouts.admin')

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropzone.css')}}"/> -->
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/> -->
@endsection

@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
	    <h4 class="page-title">Edit User Details </h4>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
	        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
	        <li class="breadcrumb-item active" aria-current="page">Edit User Details</li>
	    </ol>
   </div>
    <div class="col-sm-3">
       	<div class="btn-group float-sm-right">
        	<a href="{{route('service.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
      	</div>
    </div>
</div>
    <!-- End Breadcrumb-->
@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-6 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Service</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('user.update', $user->id)}}">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Role</label>
							<select name="role_id" class="form-control form-control-rounded" required>
								@if($user->role_id)
									<option value="{{$user->role_id}}">{{$user->role->name}}</option>
								@endif
								<option value="">--- Select Role ---</option>
								@foreach($roles as $role)
								<option value="{{$role->id}}">{{$role->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="input-13">Email</label>
							<input type="email" name="email" class="form-control form-control-rounded" required value="{{$user->email}}" disabled>
						</div>	
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Fullname</label>
							<input type="text" name="name" class="form-control form-control-rounded" min="0" required value="{{$user->name}}" disabled>
						</div>						
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Verify</label>
							<select name="active" class="form-control form-control-rounded">
								<option value="">---- Verify User------</option>
								<option value="yes">yes</option>
								<option value="no">no</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Update User</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script src="{{URL::to('assets/js/jquery.repeater.js')}}"></script>
<script src="{{URL::to('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<!-- <script src="{{URL::to('assets/js/dropzone.js')}}"></script> -->


@endsection