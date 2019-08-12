<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.partials._head')
</head>

<body>
    <!-- START PRELOADER -->
    <div class="preloader">
        <div class="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- / END PRELOADER -->

    @yield('header')

    @yield('content')

    @include('web.partials._footer')
    @include('web.partials._scripts')
</body>

</html>