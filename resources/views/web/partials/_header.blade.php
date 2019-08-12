<header id="home" class="welcome-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- START LOGO DESIGN AREA -->
                    <div class="logo" >
                        <img src="{{URL::to('assets-visitors/images/lh2.svg')}}" alt="" style="width: 100px">
                        <a href="/">
                            <p>Legal Hub</p>
                        </a>
                    </div>
                    <!-- END LOGO DESIGN AREA -->
                </div>
                <div class="col-md-8">
                    @yield('menu_content')
                </div>
            </div>
        </div>
    </div>
    @yield('banner')
</header>