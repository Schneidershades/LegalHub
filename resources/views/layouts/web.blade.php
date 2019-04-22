<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.partials._head')
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!--===============================================================================-->
        
        <!--====== Preloader Start ======-->
        <div id="preloader">
            <div id="status"><div class="lds-hourglass"></div></div>
        </div>
        <!--====== Preloader End ======-->
        <!-- Start Header Section -->
        @include('web.partials._header')
        <!-- End Header Section -->
        @yield('content')
        <!-- Start Footer Section -->
        @include('web.partials._footer')
        <!-- End of Footer Section -->
    <!-- **********Included Scripts*********** -->

   @include('web.partials._scripts')
</body>

</html>