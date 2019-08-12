@extends('layouts.admin')
@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropify.css')}}"/> -->
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/> -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/summernote/dist/summernote-bs4.css')}}"/>
@endsection
@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Update Web Settings </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Web Settings</li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Service</div>
                <hr>
                <form class="color-form" method="POST" action="{{route('setting.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input-13">Logo Image</label>
                            <input type="file" name="logo" class="dropify" data-default-file="{{$setting->logo ? URL::to($setting->logo) : 'null'}}">
                        </div>
                         <div class="form-group col-md-3">
                            <label for="input-13">Name</label>
                            <input type="text" name="name" class="form-control form-control-rounded" maxlength="180" value="{{$setting->name}}" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Phone Number 1</label>
                            <input type="text" name="phone_number_1" class="form-control form-control-rounded" maxlength="180" value="{{$setting->phone_number_1}}" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Phone Number</label>
                            <input type="text" name="phone_number_2" class="form-control form-control-rounded" required value="{{$setting->phone_number_2}}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Email 1</label>
                            <input type="email" name="email_1" class="form-control form-control-rounded" maxlength="180" value="{{$setting->email_1}}" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Email 2</label>
                            <input type="email" name="email_2" class="form-control form-control-rounded" maxlength="180" value="{{$setting->email_2}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-13">Address 1</label>
                            <input type="text" name="address_1" class="form-control form-control-rounded" maxlength="180" value="{{$setting->address_1}}" required >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-13">Address 2</label>
                            <input type="text" name="address_2" class="form-control form-control-rounded" maxlength="180" value="{{$setting->address_2}}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">City</label>
                            <input type="text" name="city" class="form-control form-control-rounded" maxlength="180" value="{{$setting->city}}" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">State</label>
                            <input type="text" name="state" class="form-control form-control-rounded"  value="{{$setting->state}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Country</label>
                            <input type="text" name="country" class="form-control form-control-rounded" required value="{{$setting->country}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Website </label>
                            <input type="text" name="website" class="form-control form-control-rounded" value="{{$setting->website}}" required >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input-13">Motto</label>
                            <input type="text" name="motto" class="form-control form-control-rounded" maxlength="180" value="{{$setting->motto}}" required >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Facebook</label>
                            <input type="text" name="facebook" class="form-control form-control-rounded"  value="{{$setting->facebook}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Twitter</label>
                            <input type="text" name="twitter" class="form-control form-control-rounded" required value="{{$setting->twitter}}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control form-control-rounded" maxlength="180" value="{{$setting->linkedin}}"  >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Pinterest</label>
                            <input type="text" name="pinterest" class="form-control form-control-rounded"  value="{{$setting->pinterest}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">GooglePlus</label>
                            <input type="text" name="googleplus" class="form-control form-control-rounded"  value="{{$setting->googleplus}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Instagram </label>
                            <input type="text" name="instagram" class="form-control form-control-rounded" value="{{$setting->instagram}}"  >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input-13">About Image</label>
                            <input type="file" name="about_image" class="dropify" data-default-file="{{$setting->about_image ? URL::to($setting->about_image) : 'null'}}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="">SEO Keywords </label>
                            <input type="text" class="form-control" name="meta_keywords" value="{{$settings->meta_keywords}}" required>
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="">SEO Description </label>
                            <input type="text" class="form-control" name="meta_description" value="{{$settings->meta_description}}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="input-13">Home Description</label>
                            <textarea name="home_description" id="summernoteEditor" cols="30" rows="10" class="form-control form-control-rounded">{{$setting->home_description}}</textarea>
                            <!-- <input type="text" name="googleplus" class="form-control form-control-rounded"  value="{{$setting->googleplus}}"> -->
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-13">About Description </label>
                            <textarea name="about_description" id="summernoteEditor2" cols="30" rows="10" class="form-control form-control-rounded">{{$setting->about_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Update Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{URL::to('assets/js/dropify.js')}}"></script>
<script src="{{URL::to('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
   $('#summernoteEditor,#summernoteEditor2').summernote({
        height: 400,
        tabsize: 2
    });
</script>
@endsection

@section('stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" type="text/css" rel="stylesheet" />
@endsection

