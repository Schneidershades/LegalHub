@extends('layouts.admin')

@section('content')
	@include('dashboard.partials._errors')

	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Copyright Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">ID</label><br>
	              		<b>{{$copyright->identifier}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Type</label><br>
	              		<b>{{$copyright->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Amount</label><br>
	              		<b>{{$copyright->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Transaction Status</label><br>
	              		<span class="badge badge-danger m-1">{{$copyright->registrationTransactions->first()->status}}</span>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">approval </label><br>
	              		<span class="badge badge-dark m-1">{{$copyright->registrationTransactions->first()->approval }}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Execution </label><br>
	              		<span class="badge badge-dark m-1">{{$copyright->registrationTransactions->first()->execution}}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Created</label><br>
	              		<b>{{$copyright->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$copyright->registrationTransactions->first()->updated_at}}</b>
					</div>
					
					@if ($copyright->registrationTransactions->first()->issue)
					<div class="col-md-6">
	              		<label for="input-9">Error</label><br>
	              		<b >{{$copyright->registrationTransactions->first()->issue}}</b>
					</div>
					@endif
					
					@if ($copyright->registrationTransactions->first()->error)
					<div class="col-md-6">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$copyright->registrationTransactions->first()->error}}</b>
					</div>
					@endif

				</div>
				<br><br>		


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Details</div>
				<hr>
				<div class="form-group row">
					<div class="col-md-3">
	              		<label for="input-9">Copyright Name</label><br>
	              		{{$copyright->name}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date</label><br>
	              		{{$copyright->dob}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date</label><br>
	              		{{$copyright->email}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date</label><br>
	              		{{$copyright->phone_number}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Address</label><br>
	              		{{$copyright->address}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">City</label><br>
	              		{{$copyright->city}}
					</div>
					
					<div class="col-md-3">
	              		<label for="input-9">State</label><br>
	              		{{$copyright->state}}
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Country</label><br>
	              		{{$copyright->country}}
					</div>

				</div>
				
				<br><br>

				<div class="card-title text-uppercase ">
					<i class="fa fa-address-book-o"></i> 
					PARTICULARS OF PROPRIETORS</div>
				<hr>	
				@foreach($copyright->agents as $partner)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW PROPRIETORS</div><br>
					</div>
					<div class="col-md-3">
						<label for="input-13">Full Name</label><br>
						<b>{{$partner->full_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$partner->email}}</b>
					</div>
					<!-- <div class="col-md-3">
						<label for="input-13">ID. Type</label><br>
						<b>{{$partner->identity_type}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. No</label><br>
						<b>{{$partner->identity_no}}</b>
					</div> -->

					<div class="col-md-3">
						<label for="input-13">Phone number</label><br>
						<b>{{$partner->phone_number}}</b>
					</div>

					<!-- <div class="col-md-3">
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
					</div> -->

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
					<!-- <div class="col-md-4">			
						<label for="input-13">ID Image</label>
						<input type="file" name="id_image" class="form-control form-control-rounded"/>
					</div>

					<div class="col-md-4">
						<label for="input-13">Signature</label>
						<input type="file" name="signature" class="form-control form-control-rounded"/>
					</div>

					<div class="col-md-4">
						<label for="input-13">Passport Image</label>
						<input type="file" name="passport"  class="form-control form-control-rounded"/>
					</div> -->
				</div>
				@endforeach

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Copyright Class</div>
				<hr>

				<div class="form-row">
					<div class="col-md-4">
						<label for="input-13">Copyright Work</label><br>
						<img src="{{URL::to($copyright->copyright_file)}}" alt="{{$partner->name}}" style="height:60%; width:40%">
					</div>
				</div><br>

				

				<div class="form-group row">
					<div class="col-sm-10">
						<a href="{{route('copyright.edit', $copyright->identifier)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit Business Copyright Details</a>
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
