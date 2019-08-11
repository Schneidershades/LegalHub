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
                    <!-- START MENU DESIGN AREA -->
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active">
                                        <a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div>
                                        </a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#about">About</a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#service">service</a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#portfolio">Success Story</a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#blog">blog</a>
                                    </li>
                                    <li><a class="smoth-scroll" href="#contact">contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END MENU DESIGN AREA -->
                </div>
            </div>
        </div>
    </div>
        <div class="welcome-slider-area">
            <div id="welcome-slide-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    <li data-target="#welcome-slide-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#welcome-slide-carousel" data-slide-to="1"></li>
                    <li data-target="#welcome-slide-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($sliders as $slider)
                    @if($loop->first)
                    <div class="item active">
                    @else
                    <div class="item">
                    @endif
                        <div class="single-slide-item" style="background: url({{URL::to($slider->image)}});">
                            <div class="single-slide-item-table">
                                <div class="single-slide-item-tablecell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="header-text">
                                                    <h2>{{$slider->title}}</h2>
                                                    <p>{{$slider->description}}</p>
                                                    <a class="slide-btn smoth-scroll" href="#about">Book an Appointment</a>
                                                    <a class="smoth-scroll hire-us-slide-btn" href="#contact">Contact Us</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</header>