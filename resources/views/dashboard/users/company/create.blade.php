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
	    <h4 class="page-title">New Company Registration</h4>
	    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Company Registration</li>
     </ol>
    </div>
 	<div class="col-sm-3">
	   <div class="btn-group float-sm-right">
	    <a href="{{route('company.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
	  </div>
	</div>
</div>
<!-- End Breadcrumb-->

@include('dashboard.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Choose your Company Name</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
					@csrf
					<div class='repeater'>
						<div data-repeater-list="company_name_details" class="form-row">
							<div class="form-group col-md-3" data-repeater-item>
								<label for="input-9">Company Name</label>
								<input type="text" class="form-control form-control-rounded" id="input-9" name="company_name" required/>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Type of Company</div>
					<hr>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Choose your Type of Company</label>
							<br>
							<br>
							<input type="radio"  name="company_type" value="private-limited-company"  checked/> Private Limited Company
							<input type="radio"  name="company_type" value="public-limited-company"  /> Public Limited Company
							<input type="radio"  name="company_type" value="company-limited-by-guarantee"/> Limited by Guarantee
						</div>
					</div><br>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Address</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="input-13">Input a Registered Office address</label>
							<input name="company_address" class="form-control form-control-rounded" required>
						</div>
						<div class="form-group col-md-6">
							<label for="input-13">Company Email</label>
							<input name="company_email" class="form-control form-control-rounded" required>
						</div>
					</div><br>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> OBJECTIVES OF THE COMPANY</div>
					<hr>
					<div class='repeater'>
						<div data-repeater-list="company_objective_details" class="form-row">
							<div class="form-group col-md-6" data-repeater-item>
								<label for="input-9">Company Objectives</label>
								<textarea name="company_objective" placeholder="Company Objective" cols="10" rows="4" class="form-control form-control-rounded" required></textarea>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div><br>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Company Share Capital</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">share capital</label>
							<input name="company_share_capital" type="number" class="form-control form-control-rounded" placeholder="Input your proposing share capital"  min="500000" required>
						</div>
					</div><br><br>
					

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF DIRECTORS</div>
					<hr>

					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="company_partners_details">
							<div data-repeater-item class="form-group row">
								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW DIRECTOR</div><br>
								</div>
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="email" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="identity_type" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. No</label>
									<input type="text" name="identity_no" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="phone_number" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="gender" class="form-control form-control-rounded" required>
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>

								<div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="dob" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Nationality</label>
									<input type="text" name="nationality"  class="form-control form-control-rounded" required/>
								</div>

								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="address" id="" cols="10" rows="1" class="form-control form-control-rounded" required></textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">City</label>
									<input type="text" name="city" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">State</label>
									<input type="text" name="state" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Country</label>
									<input type="text" name="country" class="form-control form-control-rounded" required/>
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

						        <div class="form-group col-md-12">
						        	<button data-repeater-delete type="button" id="" class="badge badge-pill badge-danger m-1" >-</button>
						        </div>
						    </div>
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF SECRETARY</div>
					<hr>

					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="company_secretary_details">
							<div data-repeater-item class="form-group row">
								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW SECRETARY</div><br>
								</div>
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="secretary_full_name" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="secretary_gender" class="form-control form-control-rounded" required>
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="secretary_dob" class="form-control form-control-rounded" required/>
								</div>


								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="secretary_email" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="secretary_identity_type" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. No</label>
									<input type="text" name="secretary_identity_no" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="secretary_phone_number" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">RC No./</label>
									<input type="text" name="secretary_rc_no" class="form-control form-control-rounded" required/>
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

						        <div class="form-group col-md-12">
						        	<button data-repeater-delete type="button" id="" class="badge badge-pill badge-danger m-1" >-</button>
						        </div>
						    </div>
						</div>
						<div class="text-right">
							<button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</div>

					<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> PARTICULARS OF SHAREHOLDING</div>
					<hr>

					<div class='repeater'>
						<!-- Make sure the repeater list value is different from the first repeater  -->
						<div data-repeater-list="company_shareholders_details">
							<div data-repeater-item class="form-group row">
								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW SHAREHOLDING</div><br>
								</div>
								<!-- <input type="text" class="form-control form-control-rounded " id="input-9" name="" value=""/> -->
								<div class="col-md-3">
									<label for="input-13">Full Name</label>
									<input type="text" name="shareholder_full_name" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="shareholder_email" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="shareholder_phone_number" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Gender</label>
									<select name="shareholder_gender" class="form-control form-control-rounded" required>
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>

								<div class="col-md-3">
									<label for="input-13">Date of Birth</label>
									<input type="date" id="default-datepicker" name="shareholder_dob" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">ID. Type</label>
									<input type="text" name="shareholder_identity_type" class="form-control form-control-rounded" required/>
								</div>
								<div class="col-md-3">
									<label for="input-13">ID. Number</label>
									<input type="text" name="shareholder_identity_no" class="form-control form-control-rounded" required/>
								</div>


								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="shareholder_address" id="" cols="10" rows="1" class="form-control form-control-rounded" required></textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">Number of Shares Taken</label>
									<input type="number" name="shareholder_shares" class="form-control form-control-rounded" required/>
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
								

								<div class="form-group col-md-12">
									<button data-repeater-delete type="button" id="" class="badge badge-pill badge-danger m-1" >-</button>
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