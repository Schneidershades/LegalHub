@extends('layouts.admin')

@section('content')
	@include('backend.partials._errors')

	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Business Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">ID</label><br>
	              		<b>{{$business->identifier}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Type</label><br>
	              		<b>{{$business->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Amount</label><br>
	              		<b>{{$business->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Transaction Status</label><br>
	              		<span class="badge badge-danger m-1">{{$business->registrationTransactions->first()->status}}</span>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">approval </label><br>
	              		<span class="badge badge-dark m-1">{{$business->registrationTransactions->first()->approval }}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Execution </label><br>
	              		<span class="badge badge-dark m-1">{{$business->registrationTransactions->first()->execution}}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Created</label><br>
	              		<b>{{$business->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$business->registrationTransactions->first()->updated_at}}</b>
					</div>
					
					@if ($business->registrationTransactions->first()->issue)
					<div class="col-md-6">
	              		<label for="input-9">Error</label><br>
	              		<b >{{$business->registrationTransactions->first()->issue}}</b>
					</div>
					@endif
					
					@if ($business->registrationTransactions->first()->error)
					<div class="col-md-6">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$business->registrationTransactions->first()->error}}</b>
					</div>
					@endif

				</div>
				<br><br>	


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Business Name</div>
				<hr>
				@foreach($business->businessNames as $name)
				<div class="form-group col-md-3" data-repeater-item>
              		<label for="input-9">Business Name</label><br>
              		{{$name->name}}
				</div>
				@endforeach
				<br><br>

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Address</div>
				<hr>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="input-13">Business Address</label><br>
              			{{$business->business_address}}
						
					</div>

					<div class="form-group col-md-6">
						<label for="input-13">Branch Address (if any)</label><br>
              			{{$business->business_branch_address}}
					</div>
				</div><br><br>

				<div class="card-title text-uppercase ">
					<i class="fa fa-address-book-o"></i> 
					PARTICULARS OF PARTNERS/PROPRIETORS</div>
				<hr>
				@foreach($business->partnersAndDirectors as $partner)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW PARTNER</div><br>
					</div>
					<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
					<div class="col-md-3">
						<label for="input-13">Full Name</label><br>
						<b>{{$partner->full_name}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$partner->email}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. Type</label><br>
						<b>{{$partner->identity_type}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. No</label><br>
						<b>{{$partner->identity_no}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Phone number</label><br>
						<b>{{$partner->phone_number}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Gender</label><br>
						<b>{{$partner->gender}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Date of Birth</label><br>
						<b>{{$partner->dob}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Nationality</label><br>
						<b>{{$partner->nationality}}</b>
					</div>

					<div class="form-group col-md-6">
						<label for="input-13">Address</label><br>
						<b>{{$partner->address}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">City</label><br>
						<b>{{$partner->city}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">State</label><br>
						<b>{{$partner->state}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Country</label><br>
						<b>{{$partner->country}}</b>
					</div>

					<div class="col-md-4">
						<label for="input-13">Upload Image</label><br>
						<img src="{{URL::to($partner->upload_id)}}" alt="{{$partner->full_name}}" style="height:60%; width:40%">
					</div>

					<div class="col-md-4">
						<label for="input-13">Signature Image</label><br>
						<img src="{{URL::to($partner->signature)}}" alt="{{$partner->full_name}}" style="height:60%; width:40%">
					</div>
					
				</div>
				@endforeach

				<div class="form-group row">
					<div class="col-sm-10">
						<a href="{{route('business.edit', $business->identifier)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit Business Transaction Details</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection






@section('scripts')

@include('backend.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('backend.partials._datatablescss')
@endsection
