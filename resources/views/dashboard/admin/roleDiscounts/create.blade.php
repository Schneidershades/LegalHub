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
        <a href="{{route('roleDiscount.index')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create Role Discount</div>
				<hr>

				<form class="color-form" method="POST" action="{{route('roleDiscount.store')}}">
					@csrf
					
					<div class='repeater'>
							<!-- Make sure the repeater list value is different from the first repeater  -->
							<div data-repeater-list="role_discounts">
								<div data-repeater-item class="form-group row">
									<div class="col-md-12">
										<div class="card-title"><i class="fa fa-address-book-o"></i> ROLE DISCOUNT</div><br>
									</div>
									<div class="col-md-3">
										<label for="input-13">Item</label>
										<select name="role_id" id="" class="form-control">
											<option value="">---------Select Role-------</option>
											@foreach($roles as $role)
												<option value="{{$role->id}}">{{$role->name}}</option>
											@endforeach
										</select>
									</div>

									<div class="col-md-3">
										<label for="input-13">Item</label>
										<select name="item_id" id="" class="form-control">
											<option value="">---------Select Service-------</option>
											@foreach($items as $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3">
										<label for="input-13">Percentage Discount</label>
										<input type="number" name="percentage" class="form-control form-control-rounded" max="100" min="0" required/>
									</div>
									<div class="col-md-3">
										<label for="input-13">Description </label>
										<input type="text" name="description" class="form-control form-control-rounded" max="100" min="0"/>
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