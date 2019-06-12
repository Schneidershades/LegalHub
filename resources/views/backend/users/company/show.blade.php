@extends('layouts.admin')

@section('content')
	@include('backend.partials._errors')

	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Company Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">ID</label><br>
	              		<b>{{$company->identifier}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Type</label><br>
	              		<b>{{$company->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Amount</label><br>
	              		<b>{{$company->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Transaction Status</label><br>
	              		<span class="badge badge-danger m-1">{{$company->registrationTransactions->first()->status}}</span>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">approval </label><br>
	              		<span class="badge badge-dark m-1">{{$company->registrationTransactions->first()->approval }}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Execution </label><br>
	              		<span class="badge badge-dark m-1">{{$company->registrationTransactions->first()->execution}}</span>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Created</label><br>
	              		<b>{{$company->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$company->registrationTransactions->first()->updated_at}}</b>
					</div>
					
					@if ($company->registrationTransactions->first()->issue)
					<div class="col-md-6">
	              		<label for="input-9">Error</label><br>
	              		<b >{{$company->registrationTransactions->first()->issue}}</b>
					</div>
					@endif
					
					@if ($company->registrationTransactions->first()->error)
					<div class="col-md-6">
	              		<label for="input-9">Date Modified</label><br>
	              		<b >{{$company->registrationTransactions->first()->error}}</b>
					</div>
					@endif
				</div>
				<br><br>	


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Company Name</div>
				<hr>
				@foreach($company->companyNames as $name)
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
						<label for="input-13">Company Address</label><br>
              			{{$company->company_address}}
						
					</div>

					<div class="form-group col-md-6">
						<label for="input-13">Company Email</label><br>
              			{{$company->company_email}}
					</div>
				</div><br><br>

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Company Total Shares</div>
				<hr>
				<label for="input-9">Company Share Capital</label><br>
              		{{$company->company_share_capital}}
				<br><br>

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i>  Business Name</div>
				<hr>
				<label for="input-9">Company Objectives Name</label>
				@foreach($company->bodyObjectives as $objective)
				<div class="form-group col-md-6">
              		<li>{{$objective->description}}</li>
				</div>
				@endforeach
				<br><br>

				<div class="card-title text-uppercase ">
					<i class="fa fa-address-book-o"></i> 
					PARTICULARS OF PARTNERS/PROPRIETORS</div>
				<hr>	
				@foreach($company->partnersAndDirectors as $partner)
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

				@foreach($company->secretaries as $secretary)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW PARTNER</div><br>
					</div>
					<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
					<div class="col-md-3">
						<label for="input-13">Full Name</label><br>
						<b>{{$secretary->secretary_full_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$secretary->secretary_email}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. Type</label><br>
						<b>{{$secretary->secretary_identity_type}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. No</label><br>
						<b>{{$secretary->secretary_identity_no}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Phone number</label><br>
						<b>{{$secretary->secretary_phone_number}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Gender</label><br>
						<b>{{$secretary->secretary_gender}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Date of Birth</label><br>
						<b>{{$secretary->secretary_dob}}</b>
					</div>

					<div class="col-md-4">
						<label for="input-13">Upload Image</label><br>
						<img src="{{URL::to($secretary->upload_id)}}" alt="{{$secretary->secretary_full_name}}" style="height:60%; width:40%">
					</div>

					<div class="col-md-4">
						<label for="input-13">Signature Image</label><br>
						<img src="{{URL::to($secretary->signature)}}" alt="{{$secretary->secretary_full_name}}" style="height:60%; width:40%">
					</div>

					<!-- <div class="col-md-3">
						<label for="input-13">Nationality</label><br>
						<b>{{$secretary->secretary_nationality}}</b>
					</div>

					<div class="form-group col-md-6">
						<label for="input-13">Address</label><br>
						<b>{{$secretary->secretary_address}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">City</label><br>
						<b>{{$secretary->secretary_city}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">State</label><br>
						<b>{{$secretary->secretary_state}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Country</label><br>
						<b>{{$secretary->secretary_country}}</b>
					</div> -->
					
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


				@foreach($company->shareholdings as $shareholdings)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW SHAREHOLDER</div><br>
					</div>
					<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
					<div class="col-md-3">
						<label for="input-13">Full Name</label><br>
						<b>{{$shareholdings->shareholder_full_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$shareholdings->shareholder_email}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. Type</label><br>
						<b>{{$shareholdings->shareholder_identity_type}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">ID. No</label><br>
						<b>{{$shareholdings->shareholder_identity_no}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Phone number</label><br>
						<b>{{$shareholdings->shareholder_phone_number}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Gender</label><br>
						<b>{{$shareholdings->shareholder_gender}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Date of Birth</label><br>
						<b>{{$shareholdings->shareholder_dob}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Nationality</label><br>
						<b>{{$shareholdings->shareholder_nationality}}</b>
					</div>

					<div class="form-group col-md-6">
						<label for="input-13">Address</label><br>
						<b>{{$shareholdings->shareholder_address}}</b>
					</div>

					<!-- <div class="col-md-3">
						<label for="input-13">City</label><br>
						<b>{{$shareholdings->shareholder_city}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">State</label><br>
						<b>{{$shareholdings->shareholder_state}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Country</label><br>
						<b>{{$shareholdings->shareholder_country}}</b>
					</div> -->

					<div class="col-md-3">
						<label for="input-13">Shares</label><br>
						<b>{{$shareholdings->shares}}</b>
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
					<div class="col-md-4">
						<label for="input-13">Upload Image</label><br>
						<img src="{{URL::to($shareholdings->upload_id)}}" alt="{{$shareholdings->shareholder_full_name}}" style="height:60%; width:40%">
					</div>

					<div class="col-md-4">
						<label for="input-13">Signature Image</label><br>
						<img src="{{URL::to($shareholdings->signature)}}" alt="{{$shareholdings->shareholder_full_name}}" style="height:60%; width:40%">
					</div>

				</div>
				@endforeach

				<div class="form-group row">
					<div class="col-sm-10">
						<a href="{{route('company.edit', $company->identifier)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit Company Transaction Details</a>
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
