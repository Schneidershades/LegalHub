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
		    <h4 class="page-title">Create Service Items </h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Service Items</li>
         </ol>
	   </div>
     <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('service.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
@include('backend.partials._errors')
<div class="row">
	<div class="col-lg-6 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Service</div>
				<hr>

				<form class="color-form" method="PUT" action="{{route('service.update', $service->id)}}">
					@csrf

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="input-13">Service Amount Relation</label>
							<select name="item_id" class="form-control form-control-rounded" required>
								@if($service->item_id)
									<option value="{{$service->item_id}}">{{$service->item->name}}</option>
								@endif
								<option value="">--- Select Service Item ---</option>
								@foreach($items as $item)
								<option value="{{$item->id}}">{{$item->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-row">
						<!-- <div class="form-group col-md-6">
							<label for="input-13">Service Description</label>
							<input type="text" name="description" class="form-control form-control-rounded" maxlength="180" required value="{{$service->description}}">
						</div> -->
						<div class="form-group col-md-6">
							<label for="input-13">Service Amount</label>
							<input type="number" name="amount" class="form-control form-control-rounded" min="0" required value="{{$service->amount}}">
						</div>						
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="input-13">Flexible</label>
							<select name="flexible" class="form-control form-control-rounded" required>
								@if($service->flexible)
									<option value="{{$service->flexible}}">{{$service->flexible}}</option>
								@endif
								<option value="">----------</option>
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>
						</div>

						<div class="form-group col-md-4">
							<label for="input-13">Flexible Amount</label>
							<input type="number" name="flexible_amount" class="form-control form-control-rounded" required min="0" value="{{$service->flexible_amount  ? $service->flexible_amount  : '0'}}">
						</div>

						<div class="form-group col-md-4">
							<label for="input-13">Flexible State</label>
							<input type="number" name="flexible_state" class="form-control form-control-rounded" required min="0" value="{{$service->flexible_state  ?  $service->flexible_state : '0'}}">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Update</button>
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


@endsection