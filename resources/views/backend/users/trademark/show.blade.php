@extends('layouts.admin')

@section('content')
	@include('backend.partials._errors')

	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Trademark Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">ID</label><br>
	              		<b>{{$trademark->identifier}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Type</label><br>
	              		<b>{{$trademark->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Amount</label><br>
	              		<b>{{$trademark->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Transaction Status</label><br>
	              		<span class="badge badge-danger m-1">{{$trademark->registrationTransactions->first()->status}}</span>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">approval </label><br>
	              		<span class="badge badge-dark m-1">{{$trademark->registrationTransactions->first()->approval }}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Execution </label><br>
	              		<span class="badge badge-dark m-1">{{$trademark->registrationTransactions->first()->execution}}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Created</label><br>
	              		<b>{{$trademark->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$trademark->registrationTransactions->first()->updated_at}}</b>
					</div>
					
					@if ($trademark->registrationTransactions->first()->issue)
					<div class="col-md-6">
	              		<label for="input-9">Error</label><br>
	              		<b >{{$trademark->registrationTransactions->first()->issue}}</b>
					</div>
					@endif
					
					@if ($trademark->registrationTransactions->first()->error)
					<div class="col-md-6">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$trademark->registrationTransactions->first()->error}}</b>
					</div>
					@endif

				</div>
				<br><br>		


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Details</div>
				<hr>
				<div class="form-group col-md-3">
              		<label for="input-9">Trademark Name</label><br>
              		{{$trademark->name}}
				</div>

				<div class="form-group col-md-3">
              		<label for="input-9">Trademark Type</label><br>
              		{{$trademark->type}}
				</div>
				<br><br>


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Trademark Objectives </div>
				<hr>
				<label for="input-9">Company Objectives Name</label>
				@foreach($trademark->objectives as $objective)
				<div class="form-group col-md-6">
              		<li>{{$objective->description}}</li>
				</div>
				@endforeach
				<br><br>

				<div class="card-title text-uppercase ">
					<i class="fa fa-address-book-o"></i> 
					PARTICULARS OF PROPRIETORS</div>
				<hr>	
				@foreach($trademark->proprietors as $partner)
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

				<div class="card-title text-uppercase ">
					<i class="fa fa-address-book-o"></i> 
					PARTICULARS OF CORRESPONDING AGENTS
				<hr>
				</div>

				@foreach($trademark->agents as $agent)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW AGENT</div><br>
					</div>
					<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
					<div class="col-md-3">
						<label for="input-13">Full Name</label><br>
						<b>{{$agent->full_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$agent->email}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Phone number</label><br>
						<b>{{$agent->phone_number}}</b>
					</div>

					<!-- <div class="col-md-3">
						<label for="input-13">Gender</label><br>
						<b>{{$agent->gender}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Date of Birth</label><br>
						<b>{{$agent->dob}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Nationality</label><br>
						<b>{{$agent->nationality}}</b>
					</div> -->

					<div class="form-group col-md-6">
						<label for="input-13">Address</label><br>
						<b>{{$agent->address}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">City</label><br>
						<b>{{$agent->city}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">State</label><br>
						<b>{{$agent->state}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Country</label><br>
						<b>{{$agent->country}}</b>
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


				

				<div class="form-group row">
					<div class="col-sm-10">
						<a href="{{route('trademark.edit', $trademark->identifier)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit Trademark Transaction Details</a>
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
