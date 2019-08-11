<!DOCTYPE html>
<html lang="en">

<head>
  @include('dashboard.partials._head')
</head>

<body >

<!-- Start wrapper-->
 <div id="wrapper">
 
  @include('dashboard.partials._sidemenu')

  @include('dashboard.partials._topbar')

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!--Start admin Content-->
        @yield('content')
      <!--End admin Content-->
    </div>
    <!-- End container-fluid-->
    
  </div><!--End content-wrapper-->
  @include('dashboard.partials._footer')
   
  </div><!--End wrapper-->
  @include('dashboard.partials._script')

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
  
</body>
</html>
