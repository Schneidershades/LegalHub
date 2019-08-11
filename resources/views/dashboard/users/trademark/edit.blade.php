@extends('layouts.admin')

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropzone.css')}}"/> -->
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/> -->
@endsection

@section('content')

@include('dashboard.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Edit Company Registration Details</div>
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


				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Choose your Company Name</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('company.update', $trademark->id)}}" enctype="multipart/form-data">
					@csrf

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Choose your Type of Company</label>
							<br>
							<br>
							<input type="radio"  name="trademark_type" value="name" 
							{{$trademark->type == 'name' ? 'checked'   : '' }}/>Name
							<input type="radio"  name="trademark_type" value="logo"   
							{{$trademark->type == 'logo' ? 'checked'   : '' }}/> Logo
							<input type="radio"  name="trademark_type" value="slogan" 
							{{$trademark->type == 'slogan' ? 'checked'   : '' }}/> Slogan
							<input type="radio"  name="trademark_type" value="sound" 
							{{$trademark->type == 'sound' ? 'checked'   : '' }}/> Sound
						</div>

						<div class="form-group col-md-6">
							<label for="input-13">Trademark Name</label>
							<input type="text" name="trademark_name" value="{{$trademark->name}}" class="form-control form-control-rounded"/>
						</div>
					</div><br>


					
					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> OBJECTIVES OF THE TRADEMARK INITIAL</div>
					<hr>
					<div class='repeater'>
						<div data-repeater-list="trademark_objective_details" class="form-row">
							@foreach($trademark->objectives as $objective)
							<div class="form-group col-md-6" data-repeater-item>
			              		<label for="input-9">Trademark Objectives</label>
								<textarea name="trademark_objective" placeholder="Company Objective" cols="10" rows="6" class="form-control form-control-rounded" required>{{$objective->description}}</textarea>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
							@endforeach
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div><br>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF PROPRIETORS</div>
					<hr>

					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="trademark_owner_details">
							@foreach($trademark->proprietors as $partner)
							<div data-repeater-item class="form-group row">

								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW DIRECTOR</div><br>
								</div>

								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" value="{{$partner->full_name}}" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="email" class="form-control form-control-rounded" value="{{$partner->email}}" required/>
								</div>
								<!-- <div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="identity_type" class="form-control form-control-rounded" value="{{$partner->identity_type}}" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. No</label>
									<input type="text" name="identity_no" class="form-control form-control-rounded" value="{{$partner->identity_no}}" required/>
								</div> -->

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="phone_number" class="form-control form-control-rounded" value="{{$partner->phone_number}}" required/>
								</div>

								<!-- <div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="gender" class="form-control form-control-rounded" required>
										@if($partner->gender)
											<option value="{{$partner->gender}}">{{$partner->gender}}</option>
										@endif
										<option value="">--------------</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div> -->

								<div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="dob" class="form-control form-control-rounded" value="{{$partner->dob}}" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Nationality</label>
									<input type="text" name="nationality"  class="form-control form-control-rounded" value="{{$partner->nationality}}"  required/>
								</div>
	
								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="address" id="" cols="10" rows="1" class="form-control form-control-rounded" required>{{$partner->address}}</textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">City</label>
									<input type="text" name="city" class="form-control form-control-rounded" value="{{$partner->city}}"  required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">State</label>
									<input type="text" name="state" class="form-control form-control-rounded" value="{{$partner->state}}"  required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Country</label>
									<input type="text" name="country" class="form-control form-control-rounded" value="{{$partner->country}}" required/>
								</div>
								
								<div class="col-md-12">
									<hr>
									<div><i>You are meant to upload documents in png/jpg</i></div><br>
								</div>	
								
								<div class="col-md-4">			
									<label for="input-13">Upload ID</label>
									<input type="file" name="upload_id"  class="form-control form-control-rounded"/>
								</div>

								<div class="col-md-4">
									<label for="input-13">Signature</label>
									<input type="file" name="signature" class="form-control form-control-rounded"/>
								</div>


								<div class="form-group col-md-12">
									<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
								</div>
							</div>
							@endforeach
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF AGENT</div>
					<hr>

					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="trademark_corresponding_agent_details">
							@foreach($trademark->agents as $agent)
							<div data-repeater-item class="form-group row">
								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW AGENT</div><br>
								</div>
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" required value="{{$agent->full_name}}" />
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="email" class="form-control form-control-rounded" required value="{{$agent->email}}"/>
								</div>

								<!-- <div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="gender" class="form-control form-control-rounded" required>
										<option value="">---Select Gender---</option>
										<option value="m">Male</option>
										<option value="f">Female</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="dob" class="form-control form-control-rounded" value="{{$agent->dob}}" required/>
								</div>

								-->

								
								<!-- <div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="identity_type" class="form-control form-control-rounded" required value="{{$agent->identity_type}}"/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. No</label>
									<input type="text" name="identity_no" class="form-control form-control-rounded" required value="{{$agent->identity_no}}"/>
								</div> -->

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="phone_number" class="form-control form-control-rounded" required value="{{$agent->phone_number}}"/>
								</div>

								<div class="col-md-3">
									<label for="input-13">RC No./</label>
									<input type="text" name="rc_no" class="form-control form-control-rounded" required value="{{$agent->rc_no}}"/>
								</div>
								

								<div class="col-md-12">
									<hr>
									<div><i>You are meant to upload documents in png/jpg</i></div><br>
								</div>	
								
								<div class="col-md-4">			
									<label for="input-13">Upload ID</label>
									<input type="file" name="upload_id"  class="form-control form-control-rounded"/>
								</div>

								<div class="col-md-4">
									<label for="input-13">Signature</label>
									<input type="file" name="signature" class="form-control form-control-rounded"/>
								</div>

						        <div class="form-group col-md-12">
						        	<button data-repeater-delete type="button" id="" class="badge badge-pill badge-danger m-1" >-</button>
						        </div>
						    </div>
						    @endforeach
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Register</button>
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
<script>

	

	$(document).ready(function () {
		'use strict';

		$('.repeater').repeater({
			isFirstItemUndeletable: true,
			defaultValues: {
				'textarea-input': 'foo',
				'text-input': 'bar',
				'select-input': 'B',
				'checkbox-input': ['A', 'B'],
				'radio-input': 'B'
			},
			show: function () {
				$(this).slideDown();
			},
			hide: function (deleteElement) {
				if(confirm('Are you sure you want to delete this element?')) {
					$(this).slideUp(deleteElement);
				}
			},
			ready: function (setIndexes) {

			}
		});
	});
</script>

@endsection