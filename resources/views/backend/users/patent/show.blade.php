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
@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="card">
			<div class="card-body">

				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Patent Registration Details</div>
				<hr>
				<div class="form-row">
					<div class="col-md-3">
						<label for="input-9">ID</label><br>
						<b>{{$patent->identifier}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-9">Type</label><br>
						<b>{{$patent->registrationTransactions->first()->transactionable_type}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-9">Amount</label><br>
						<b>{{$patent->registrationTransactions->first()->amount}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-9">Transaction Status</label><br>
						<span class="badge badge-danger m-1">{{$patent->registrationTransactions->first()->status}}</span>
					</div>
				</div><br><br>	
				<div class="form-row">
					<div class="col-md-3">
						<label for="input-9">approval </label><br>
						<span class="badge badge-dark m-1">{{$patent->registrationTransactions->first()->approval }}</span>
					</div>

					<div class="col-md-3">
						<label for="input-9">Execution </label><br>
						<span class="badge badge-dark m-1">{{$patent->registrationTransactions->first()->execution}}</span>
					</div>

					<div class="col-md-3">
						<label for="input-9">Date Created</label><br>
						<b>{{$patent->registrationTransactions->first()->created_at}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-9">Date Modified</label><br>
						<b >{{$patent->registrationTransactions->first()->updated_at}}</b>
					</div>
					
					@if ($patent->registrationTransactions->first()->issue)
					<div class="col-md-6">
						<label for="input-9">Error</label><br>
						<b >{{$patent->registrationTransactions->first()->issue}}</b>
					</div>
					@endif
					
					@if ($patent->registrationTransactions->first()->error)
					<div class="col-md-6">
						<label for="input-9">Date Modified</label><br>
						<b >{{$patent->registrationTransactions->first()->error}}</b>
					</div>
					@endif

				</div>
				<br><br>	

				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i> Applicant Details</div>
				<hr>

				@csrf
				@foreach($patent->applicants as $partner)
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card-title"><i class="fa fa-address-book-o"></i> NEW APPLICANT</div><br>
					</div>
					<div class="col-md-3">
						<label for="input-13">First Name</label><br>
						<b>{{$partner->first_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Middle Name</label><br>
						<b>{{$partner->middle_name}}</b>
					</div>
					<div class="col-md-3">
						<label for="input-13">Last Name</label><br>
						<b>{{$partner->last_name}}</b>
					</div>

					<div class="col-md-3">
						<label for="input-13">Email</label><br>
						<b>{{$partner->email}}</b>
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

					<div class="col-md-12">
						<label for="input-13">Description</label><br>
						<b>{{$partner->description}}</b>
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
						<img src="{{URL::to($partner->upload_id)}}" alt="{{$partner->full_name}}" style="height:60%; width:40%">
					</div>

					<div class="col-md-4">
						<label for="input-13">Signature Image</label><br>
						<img src="{{URL::to($partner->signature)}}" alt="{{$partner->full_name}}" style="height:60%; width:40%">
					</div>
				</div>
				@endforeach

				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i> Address</div>
				<hr>

				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 1(a) Application for patent</div>
				<hr>

				<i>I/we</i> 

				@foreach($patent->applicants as $name)
					<u><b>{{$name->first_name}} {{$name->middle_name}} {{$name->last_name}} </b></u>,
				@endforeach

				<i>am in possession of an invention which is described in the accompanying provisional specification under title </i>
				
				<u><b>{{$patent->title}}</b></u>.
				<i>I/we the said</i> 

				@foreach($patent->applicants as $name)
					<u><b>{{$name->first_name}} {{$name->middle_name}} {{$name->last_name}} </b></u>,
				@endforeach

				<i>Claims to be the true inventor of the invention. I/we declare that to the best of my knowledge and belief that the statement made above are correct and there is no lawful ground of objection to the grant of a patent to me/us on this application, and I pray that a patent may be granted to me for the said invention. And I request that all notices, requisitions, and communications relating to this application may be sent to <u><b>{{$patent->letter_addressing}}</b></u> who are hereby appointed to act for me. </i><br><br>

				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 2 Authorization of Agent</div>
				<hr>

				<i>I/we 
					@foreach($patent->applicants as $name)
					<u><b>{{$name->first_name}} {{$name->middle_name}} {{$name->last_name}} </b></u>,
					@endforeach 
				of  <u><b>{{$patent->company_name}}</b></u> have appointed <u><b>{{$patent->agent_name}}</b></u> of No. <u><b>{{$patent->agent_number}}</b></u>
				to act as my/our Agent(s) in the application for the grant of a patent for an invention entitled: {{$patent->title}} and request that all notices, requisitions and communications relating thereto may be sent to such Agent at the above address. I/We hereby revoke all previous authorisations, if any, in respect of the same matter or proceeding.
				I/WE hereby declare that I am/we are a Limited Liability Company/ Individual.</i>
				<br><br><br><br>


				<div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i>PATENT FORM No. 3 Complete Specification - Applicant’s or Agent’s Ref.</div>
				<hr>

				<i>I <u><b>{{$patent->company_name}}</b></u> do hereby declare the invention, for which I pray that the patent may be granted to me, and the method by which it is performed, to be particularly described in and by the following statement-:</i>
				<br><br>

				@foreach($patent->statements as $statement)
					<li>{{$statement->description}}</li>,
				@endforeach

				<br><br><br>


				<i>[Note- the claim must relate to a single invention, must be clear and succinct and must be fairly based on the matter disclosed in the specification. They should define the scope of the invention claimed. Applicants should be careful that their claims includes neither more nor less than they desired to protect by their patent. Any unnecessary multiplicity of claim or prolixity of language should be avoided. Claims should not be made for the efficiency or advantage of the invention.]</i> 
				<br><br>

				<div class="form-group row">
					<div class="col-sm-10">
						<a href="{{route('patent.edit', $patent->identifier)}}" type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Edit Patent Transaction Details</a>
					</div>
				</div>
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

		// var myDropzone = new Dropzone("dropzone", { url: "{{ route('user.upload.signature')}}"});
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