@extends('layouts.admin')

@section('content')
<!-- Breadcrumb-->
 <div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">{{auth()->user()->name}}</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}}</li>
     </ol>
    </div>
    <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <a href="{{route('profile.show', auth()->user()->identifier)}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-left mr-1"></i> Back</button></a>
      </div>
    </div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-uppercase"><i class="fa fa-address-book-o"></i> Edit profile</div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="input-13">Full Name</label>
                        <br>
                        {{auth()->user()->name}}
                    </div>

                    <div class="form-group col-md-3">
                        <label for="input-13">Official Email</label>
                        <br>
                        {{auth()->user()->email}}
                    </div>
                    <div class="form-group col-md-3">
                        <label for="input-13">Primary Contact</label>
                        <br>
                        {{auth()->user()->phone}}
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="input-13">Address</label>
                        <br>
                        {{auth()->user()->address}}
                    </div>

                    <!-- <div class="form-group col-md-6">
                        <label for="input-13">Image</label>
                        <input class="form-control" name="image" type="file" class="dropify">
                    </div> -->
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
