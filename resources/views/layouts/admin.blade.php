<!DOCTYPE html>
<html lang="en">

<head>
  @include('backend.partials._head')
</head>

<body >

<!-- Start wrapper-->
 <div id="wrapper">
 
  @include('backend.partials._sidemenu')

  @include('backend.partials._topbar')

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!--Start admin Content-->
        @yield('content')
      <!--End admin Content-->
    </div>
    <!-- End container-fluid-->
    
  </div><!--End content-wrapper-->
  @include('backend.partials._footer')
   
  </div><!--End wrapper-->
  @include('backend.partials._script')

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
  
</body>
</html>
