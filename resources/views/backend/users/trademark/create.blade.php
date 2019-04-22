@extends('layouts.admin')

@section('content')

<!-- Breadcrumb-->
 <div class="row pt-2 pb-2">
    <div class="col-sm-9">
	    <h4 class="page-title">New Trademark Registration</h4>
	    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Trademark Registration</li>
     </ol>
    </div>
 	<div class="col-sm-3">
	   <div class="btn-group float-sm-right">
	    <a href="{{route('trademark.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
	  </div>
	</div>
</div>
<!-- End Breadcrumb-->

@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Trademark Name</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('trademark.store')}}" enctype="multipart/form-data">
					@csrf
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Choose your Type of Company</label>
							<br>
							<br>
							<input type="radio"  name="trademark_type" value="name" checked/>Name
							<input type="radio"  name="trademark_type" value="logo"  /> Logo
							<input type="radio"  name="trademark_type" value="slogan"/> Slogan
							<input type="radio"  name="trademark_type" value="sound"/> Sound
						</div>

						<div class="form-group col-md-6">
							<label for="input-13">Trademark Name</label>
							<input type="text" name="trademark_name" class="form-control form-control-rounded"/>
						</div>

						
					</div><br>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Trademark File</label>
							<input type="file" name="file" class="form-control form-control-rounded"/>
						</div>
					</div><br>



					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Trademark Objectives (<i>succinct description of what your company is info</i>)</div>					
					<hr>
					<div class='repeater'>
						<div data-repeater-list="trademark_objective_details" class="form-row">
							<div class="form-group col-md-6" data-repeater-item>
			              		<label for="input-9">Trademark Objective</label>
								<textarea name="trademark_objective" cols="10" rows="3" class="form-control form-control-rounded" required></textarea>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
						</div>
						<div class="text-right">
						    <button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>


					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF PROPRIETORS</div>
					<hr>

					
					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="trademark_owner_details">
							<div data-repeater-item class="form-group row">
								<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">RC No (If a company)</label>
									<input name="rc_no" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input name="email" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input name="phone_number" class="form-control form-control-rounded" required/>
								</div>
	
								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="address" id="" cols="10" rows="1" class="form-control form-control-rounded"></textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">City</label>
									<input name="city" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">State</label>
									<input name="state" class="form-control form-control-rounded" required />
								</div>

								<div class="col-md-3">
									<label for="input-13">Country</label>
									<input name="country" class="form-control form-control-rounded" required />
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
						</div>
						<div class="text-right">
						    <button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF CORRESPONDING AGENTS</div>
					<hr>

					
					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="trademark_corresponding_agent_details">
							<div data-repeater-item class="form-group row">
								<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input name="email" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input name="phone_number" class="form-control form-control-rounded" required/>
								</div>
	
								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="address" id="" cols="10" rows="1" class="form-control form-control-rounded" required></textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">City</label>
									<input name="city" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">State</label>
									<input name="state" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Country</label>
									<input name="country" class="form-control form-control-rounded" required/>
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