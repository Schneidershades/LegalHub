	@if(count($errors) > 0)
		<div class="alert alert-danger background-danger col-sm-12">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <i class="icofont icofont-close-line-circled text-white"></i>
		    </button>
		    @foreach($errors->all() as $error)
			    <strong>* {{ $error }}</strong><br>
			@endforeach
	    </div>
	@endif


	