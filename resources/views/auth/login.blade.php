<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Realtiz</title>
  <!--favicon-->
  <link rel="icon" href="{{URL::to('assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{URL::to('assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{URL::to('assets/css/app-style.css')}}" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->
 <div id="wrapper">
    <div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
         <div class="card-content p-2">
            <div class="text-center">
                <!-- <img src="web-assets/images/logo.jpg"> -->
            </div>
          <div class="card-title text-uppercase text-center py-3">Sign In</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group">
               <div class="position-relative has-icon-right">
                  <label for="exampleInputUsername" class="sr-only">Email Address</label>

                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-rounded" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
              </div>
              <div class="form-group">
               <div class="position-relative has-icon-right">
                  <label for="exampleInputPassword" class="sr-only">Password</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}  form-control-rounded" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  <div class="form-control-position">
                      <i class="icon-lock"></i>
                  </div>
               </div>
              </div>
            <div class="form-row mr-0 ml-0">
             <div class="form-group col-6">
               <div class="icheck-primary">
                <input type="checkbox" id="user-checkbox" checked="" name="remember"/>
                <label for="user-checkbox">Remember me</label>
              </div>
             </div>
             <div class="form-group col-6 text-right">
              <a href="">Reset Password</a>
             </div>
            </div>
             <button type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
              <div class="text-center pt-3">
                <hr>
                <p class="text-muted">Do not have an account? <a href=""> Sign Up here</a></p>
              </div>
             </form>
           </div>
          </div>
         </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    </div><!--wrapper-->
    
  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
  <script src="{{URL::to('assets/js/popper.min.js')}}"></script>
  <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
  
</body>

</html>

