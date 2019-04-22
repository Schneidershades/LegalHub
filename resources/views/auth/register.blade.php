@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('I am a') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="role" value="2" >Client <br>  
                                <input type="radio" name="role" value="3">Lawyer 

                                @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Start Page Title Section -->
<!-- <div class="page-ttl">
    <div class="layer-stretch">
        <div class="page-ttl-container">
            <h1>Log<span class="text-primary">In</span></h1>
            <p><a href="#">Home</a> &#8594; <span>{{ __('Register') }}</span></p>
        </div>
    </div>
</div> -->
<!-- End of Page Title Section -->
<!-- Start Login Section -->
<!-- <div class="login">
    <div class="layer-stretch">
        <div class="layer-wrapper">
            <div class="row pt-4">
                <div class="col-md-8">
                    <div class="sub-ttl"><div class="sub-ttl-text">Benefits of Login</div></div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-icon pl-5">
                                <li><i class="ti-angle-double-right"></i>Fully Responsive or Mobile Friendly</li>
                                <li><i class="ti-angle-double-right"></i>SEO Friendly</li>
                                <li><i class="ti-angle-double-right"></i>Clean Code &#38; Fully Documented</li>
                                <li><i class="ti-angle-double-right"></i>Fast Load</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-icon">
                                <li><i class="fa fa-hand-o-right"></i>Content Marketing</li>
                                <li><i class="fa fa-hand-o-right"></i>Easy to Customize, SEO Friendly</li>
                                <li><i class="fa fa-hand-o-right"></i>Google Web Fonts</li>
                                <li><i class="fa fa-hand-o-right"></i>Font Icons and More +</li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-light p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore vel veniam delectus debitis fugit non labore iste perferendis minus cumque dolor architecto, sapiente, dolores numquam incidunt quos et fuga laborum.</p>
                </div>

                <div class="col-md-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}">
                            <label class="mdl-textfield__label" for="email">Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}">
                            <label class="mdl-textfield__label" for="email">Email Address</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="password" id="password" name="password" required>
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <input class="mdl-textfield__input" type="password" id="password_confirmation" name="password_confirmation" required>
                            <label class="mdl-textfield__label" for="password">Retype Password</label>
                        </div>
                        <div class="pt-4 text-center">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent button button-dark">Register In</button>
                        </div>
                        <div class="login-link">
                            <span class="paragraph-small">Already have an account?</span>
                            <a href="#" class="">Login Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End of Login Section -->
<!-- Start Action Section -->
<!--  <div class="action">
    <div class="layer-stretch">
        <div class="layer-wrapper text-center">
            <div class="layer-ttl"><h4>We design <span class="text-primary">delightful</span> digital experiences</h4></div>
            <div class="action-content">Read more about what we do and our philosophy of design. Judge for yourself The work and results we’ve achieved for other clients, and meet our highly experienced Team who just love to design, develop and deploy. Tell Us Your Story</div>
            <a href="#" class="btn btn-outline btn-primary btn-pill btn-outline-2x btn-lg mt-3">Tell Us Your Story</a>
        </div>
    </div>
</div> --><!-- End of Action Section -->

@endsection
