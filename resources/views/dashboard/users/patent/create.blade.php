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
	    <h4 class="page-title">New Patent Registration</h4>
	    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Patent Registration</li>
     </ol>
    </div>
 	<div class="col-sm-3">
	   <div class="btn-group float-sm-right">
	    <a href="{{route('patent.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
	  </div>
	</div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i> Applicant Details</div>
				<hr>

				<form class="" method="POST" action="{{route('patent.store')}}" enctype="multipart/form-data">
					@csrf
					<div class='repeater'>
						<div data-repeater-list="patent_applicant_details" class="form-row">
							<div data-repeater-item class="form-group row">
								<div class="col-md-12">
									<div class="card-title"><i class="fa fa-address-book-o"></i> NEW APPLICANT</div><br>
								</div>
								<div class="col-md-3">
									<label for="input-13">Applicant Full Name</label>
									<input type="text" name="full_name" class="form-control form-control-rounded" required/>
								</div>

								<div class="col-md-3">
									<label for="input-13">Email</label>
									<input type="email" name="email" class="form-control form-control-rounded" required/>
								</div>

								<div class="form-group col-md-6">
									<label for="input-13">Address</label>
									<textarea name="address" id="" cols="10" rows="1" class="form-control form-control-rounded" required></textarea>
								</div>

								<div class="col-md-3">
									<label for="input-13">Phone number</label>
									<input type="text" name="phone_number" class="form-control form-control-rounded" required/>
								</div>

								<div class="form-group col-md-6">
									<label for="input-13">Patent file (if any) </label>
									<input type="file" name="content_file" id="dropzone" class="form-control form-control-rounded" />
								</div>

								<div class="col-md-6">
									<label for="input-13">Description of the relevant invention (in a manner sufficiently clear and complete for the invention to be put in effect by a person skilled in the art or field of knowledge to which the invention relates) with plans and drawings in </label>
									<textarea name="patent_description" id="" cols="10" rows="3" class="form-control form-control-rounded" required></textarea>
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

					<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i> Address</div>
					<hr>

					<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 1(a) Application for patent</div>
					<hr>

					<i>I/we</i> 
					
					<span class='repeatInner'>
						<div data-repeater-list="patent_applicant_details" class="form-row">
							<div class="form-group col-md-3" data-repeater-item>
			              		<label for="input-9">The Applicant Name</label>
								<input type="text" class="form-control form-control-rounded" id="input-9" name="name" required/>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
						</div>
						<div class="text-right">
						    <button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</span>

					<i>am in possession of an invention which is described in the accompanying provisional specification under title </i>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Title</label>
							<input type="text" class="form-control form-control-rounded" id="input-9" name="title" required/>
						</div>
					</div>

					<i>I/we the said in the applicant name(s) aboveClaims to be the true inventor of the invention.</i>

					<i>I/we declare that to the best of my knowledge and belief that the statement made above are correct and there is no lawful ground of objection to the grant of a patent to me/us on this application, and I pray that a patent may be granted to me for the said invention. And I request that all notices, requisitions, and communications relating to this application may be sent to
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13"></label>
							<input type="text" class="form-control form-control-rounded" id="input-9" name="letter_addressing" required/>
						</div>
					</div>
					who are hereby appointed to act for me. </i><br><br>

					<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 2 Authorization of Agent</div>
					<hr>

					<i>I/we the applicant name(s) in <b>PATENT FORM No. 1(a)</b> of</i>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Name of Company/ Individual </label>
							<input type="text" class="form-control form-control-rounded" id="input-9" name="company_name" required/>
						</div>
					</div>
					
					<i>have appointed </i>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Agent Name</label>
							<input type="text" class="form-control form-control-rounded" id="input-9" name="agent_name" required/>
						</div>
					</div>

					<i>of No.</i>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Agent Number</label>
							<input type="text" class="form-control form-control-rounded" id="input-9" name="agent_number" required/>
						</div>
					</div>

					<i>to act as my/our Agent(s) in the application for the grant of a patent for an invention entitled: (in above title in PATENT FORM No. 1(a)) and request that all notices, requisitions and communications relating thereto may be sent to such Agent at the above address. I/We hereby revoke all previous authorisations, if any, in respect of the same matter or proceeding. I/WE hereby declare that I am/we are a Limited Liability Company/ Individual.</i>

					<br><br><br><br>


					<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 3 Complete Specification - Applicant’s or Agent’s Ref.</div>
					<hr>

					<i>I  (in above name of company/individual title in PATENT FORM No. 2) do hereby declare the invention, for which I pray that the patent may be granted to me, and the method by which it is performed, to be particularly described in and by the following statement-:</i>
					<br><br>
					
					<span class='repeatInner'>
						<div data-repeater-list="patent_statement_details" class="form-row">
							<div class="form-group col-md-6" data-repeater-item>
								<label for="input-9">Patent Statement</label>
								<textarea name="patent_statement" placeholder="Type your Patent Statement" cols="10" rows="4" class="form-control form-control-rounded" required></textarea>
								<button data-repeater-delete type="button" class="badge badge-pill badge-danger m-1" >-</button>
							</div>
						</div>
						<div class="text-right">
						    <button data-repeater-create type="button" class="btn btn-primary waves-effect waves-light m-1"> + </button>
						</div>
					</span>


					<i>[Note- the claim must relate to a single invention, must be clear and succinct and must be fairly based on the matter disclosed in the specification. They should define the scope of the invention claimed. Applicants should be careful that their claims includes neither more nor less than they desired to protect by their patent. Any unnecessary multiplicity of claim or prolixity of language should be avoided. Claims should not be made for the efficiency or advantage of the invention.]</i> 
					<br><br>

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
		$('.repeater, .repeatInner').repeater({
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