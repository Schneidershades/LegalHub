@extends('layouts.admin')

@section('content')
<!-- Breadcrumb-->
 <div class="row pt-2 pb-2">
    <div class="col-sm-9">
	    <h4 class="page-title">Edit Copyright Registration</h4>
	    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit  Copyright Registration</li>
     </ol>
    </div>
 	<div class="col-sm-3">
	   <div class="btn-group float-sm-right">
	    <a href="{{route('copyright.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
	  </div>
	</div>
</div>
<!-- End Breadcrumb-->

@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Copyright</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('copyright.update', $copyright->identifier)}}" enctype="multipart/form-data">
					@csrf
					
					<div class="form-row">
						<div class="form-group col-md-7">
							<label for="input-13">Copyright Name</label>
							<input type="text" name="name" placeholder="Company Name or Name of Copyright Owner" class="form-control form-control-rounded" value="{{$copyright->name}}" />
						</div>					
						<div class="col-md-5">
							<label for="input-13">Date of Birth</label>
							<input type="date" id="default-datepicker" name="dob" class="form-control form-control-rounded" required value="{{$copyright->dob}}" />
						</div>

						<div class="col-md-3">
							<label for="input-13">Email</label>
							<input name="email" class="form-control form-control-rounded" value="{{$copyright->email}}"/>
						</div>

						<div class="col-md-3">
							<label for="input-13">Phone number</label>
							<input name="phone_number" class="form-control form-control-rounded" value="{{$copyright->phone_number}}"/>
						</div>

						<div class="form-group col-md-6">
							<label for="input-13">Address</label>
							<textarea name="address" id="" cols="10" rows="2" class="form-control form-control-rounded" required>{{$copyright->address}}</textarea>
						</div>

						<div class="col-md-3">
							<label for="input-13">City</label>
							<input name="city" class="form-control form-control-rounded" value="{{$copyright->city}}"/>
						</div>

						<div class="col-md-3">
							<label for="input-13">State</label>
							<input name="state" class="form-control form-control-rounded" value="{{$copyright->state}}"/>
						</div>

						<div class="col-md-3">
							<label for="input-13">Country</label>
							<input name="country" class="form-control form-control-rounded" value="{{$copyright->country}}"/>
						</div>
					</div><br>

					

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF CORRRESPONDING AGENTS</div>
					<hr>

					
					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->

						<div data-repeater-list="agent_owner_details">
							@foreach($copyright->agents as $partner)
							<div data-repeater-item class="form-group row">

								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> AGENT DIRECTOR</div><br>
								</div>

								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" value="{{$partner->first_name}}" required/>
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

								<!-- <div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="dob" class="form-control form-control-rounded" value="{{$partner->dob}}" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Nationality</label>
									<input type="text" name="nationality"  class="form-control form-control-rounded" value="{{$partner->nationality}}"  required/>
								</div> -->
	
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


					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Copyright Class</div>
					<hr>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Copyright Work:</label><br>
							<i>Literary, Artistic, Computer Program CLICK HERE TO UPLOAD THE WORK (We would contact you if you do not have a soft copy of it) </i>
							<input type="file" name="copyright_file" class="form-control form-control-rounded"/>
						</div>
					</div><br>



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