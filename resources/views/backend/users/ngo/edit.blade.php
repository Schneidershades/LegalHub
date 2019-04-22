@extends('layouts.admin')

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<link rel="stylesheet" href="{{ URL::to('assets/css/dropzone.css')}}"/>
<link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" type="text/css" rel="stylesheet" />
@endsection

@section('content')

@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> NGO Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">ID</label><br>
	              		<b>{{$ngo->identifier}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Type</label><br>
	              		<b>{{$ngo->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Amount</label><br>
	              		<b>{{$ngo->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Status</label><br>
	              		<b>{{$ngo->registrationTransactions->first()->status}}</b>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
	              		<label for="input-9">Date Created</label><br>
	              		<b>{{$ngo->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
	              		<label for="input-9">Date Modified</label><br>
	              		<b>{{$ngo->registrationTransactions->first()->updated_at}}</b>
					</div>
				</div>
				<br><br>

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Choose your Business Name</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('business.update', $ngo->id)}}" enctype="multipart/form-data">
					@csrf
					<div class='repeater'>
						<div data-repeater-list="ngo_name_details" class="form-row">
							@foreach($ngo->ngoNames as $name)
							<div class="form-group col-md-3" data-repeater-item>
			              		<label for="input-9">Ngo Name</label>
								<input type="text" class="form-control form-control-rounded" id="input-9" name="ngo_name" value="{{$name->name}}" required/>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
							@endforeach
						</div>
						<div class="text-right">
						    <button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Address</div>
					<hr>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Address</label>
							<textarea name="address" id="" cols="10" rows="3" class="form-control form-control-rounded" 
							required>{{$ngo->address}}
							</textarea>
						</div>

					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF Trustees</div>
					<hr>

					<div class='repeater'>
						
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="business_partners_details">
							@foreach($ngo->trustees as $partner)
							<div data-repeater-item class="form-group row">

								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW TRUSTEE</div><br>
								</div>
								<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="first_name" class="form-control form-control-rounded" value="{{$partner->full_name}}" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="email" class="form-control form-control-rounded" value="{{$partner->email}}" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="identity_type" class="form-control form-control-rounded" value="{{$partner->identity_type}}" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. No</label>
									<input type="text" name="identity_no" class="form-control form-control-rounded" value="{{$partner->identity_no}}" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="phone_number" class="form-control form-control-rounded" value="{{$partner->phone_number}}" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="gender" class="form-control form-control-rounded" required>
										@if($partner->gender)
											<option value="{{$partner->gender}}">{{$partner->gender}}</option>
										@endif
										<option value="">--------------</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>

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
									<div><i>You are meant to upload documents in png/jpg/pdf</i></div><br>
								</div>	
								
								<div class="col-md-4">			
									<label for="input-13">Upload ID</label>
									<input type="file" name="upload_id" class="form-control form-control-rounded"/>
								</div>

								<div class="col-md-4">
									<label for="input-13">Signature</label>
									<input type="file" name="signature" class="form-control form-control-rounded"/>
								</div>
								

						        <div class="col-md-4">
						            <label for="input-13">Copy of constitution</label>
						            <input type="file" name="constitution_file" id="dropzone" class="form-control form-control-rounded" />
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
<script src="{{URL::to('assets/js/dropzone.js')}}"></script>
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js')}}"></script>
<script>

	$('.dropify').dropify();

	$(document).ready(function () {
		'use strict';
		$('.dropify').dropify();

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