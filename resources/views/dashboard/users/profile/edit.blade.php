@extends('layouts.dashboard')

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropzone.css')}}"/> -->
<link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/dropify.css')}}"/> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<!-- Breadcrumb-->
 <div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Edit Profile {{auth()->user()->name}}</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile {{auth()->user()->name}}</li>
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
                <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Edit profile</div>
                <hr>

                <form class="color-form" method="POST" action="{{route('profile.update', auth()->user()->identifier)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="input-13">Full Name</label>
                            <input class="form-control" type="text" name="fullname" value="{{auth()->user()->name}}" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Official Email</label>
                            <input class="form-control" type="text" name="official_email" value="{{auth()->user()->official_email}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Primary Contact</label>
                            <input class="form-control" type="text" name="phone1" value="{{auth()->user()->phone1}}" placeholder="Primary Contact" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Official Email</label>
                            <input class="form-control" type="text" name="phone2" value="{{auth()->user()->phone2}}" placeholder="Secondary Contact" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Website</label>
                            <input class="form-control" type="text" name="website" value="{{auth()->user()->Website}}" placeholder="Website" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Facebook Username</label>
                            <input class="form-control" type="text" name="facebook" value="{{auth()->user()->facebook}}" placeholder="Facebook Username">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Linkedin Username</label>
                            <input class="form-control" type="text" name="website" value="{{auth()->user()->linkedin}}" placeholder="Linkedin Username" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Twitter Username</label>
                            <input class="form-control" type="text" name="twitter" value="{{auth()->user()->twitter}}" placeholder="Twitter Username">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Instagram Username</label>
                            <input class="form-control" type="text" name="instagram" value="{{auth()->user()->instagram}}" placeholder="Instagram Username" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Pinterest Username</label>
                            <input class="form-control" type="text" name="pinterest" value="{{auth()->user()->pinterest}}" placeholder="Pinterest Username">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">Googleplus Username</label>
                            <input class="form-control" type="text" name="googleplus" value="{{auth()->user()->googleplus}}" placeholder="Googleplus Username" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Whatsapp number</label>
                            <input class="form-control" type="text" name="whatsapp" value="{{auth()->user()->whatsapp}}" placeholder="Whatsapp number" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Address</label>
                            <input class="form-control" type="text" name="address" value="{{auth()->user()->address}}" placeholder="Street">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13">City</label>
                           <input class="form-control" type="text" name="city_id" value="{{auth()->user()->city_id}}" placeholder="City">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">State</label>
                            <input class="form-control" type="text" value="{{auth()->user()->state_id}}" name="state_id" placeholder="State">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="input-13">Postal Code</label>
                            <input class="form-control" type="text" value="{{auth()->user()->postal_code}}" name="postal_code" placeholder="Postal Code">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input-13">Biography</label>
                            <textarea name="about" id="" class="form-control" cols="70" rows="5"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input-13">Tell us about your journey with achievers confluence</label>
                            <textarea name="testimonials" id="" class="form-control" cols="70" rows="5"></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="input-13">Image</label>
                            <input class="form-control" name="image" type="file" class="dropify">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Update Profile</button>
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
<!-- <script src="{{URL::to('assets/js/dropify.js')}}"></script> -->
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js')}}"></script>
<script>

    $('.dropify').dropify();
    // 
    
    // $(document).ready(function () {
    //     'use strict';

    
        

    //     $('.repeater').repeater({
    //         isFirstItemUndeletable: true,
    //         defaultValues: {
    //             'textarea-input': 'foo',
    //             'text-input': 'bar',
    //             'select-input': 'B',
    //             'checkbox-input': ['A', 'B'],
    //             'radio-input': 'B'
    //         },
    //         show: function () {
    //             $(this).slideDown();
    //         },
    //         hide: function (deleteElement) {
    //             if(confirm('Are you sure you want to delete this element?')) {
    //                 $(this).slideUp(deleteElement);
    //             }
    //         },
    //         ready: function (setIndexes) {

    //         }
    //     });


    //     $('.dropify').dropify();
    // });
</script>

@endsection