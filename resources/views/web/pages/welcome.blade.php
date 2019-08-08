<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE -->
    <title>LegalHub &#8211;</title>
    <!-- FAVI ICON -->
    <link rel="icon" type="image/png" href="assets-visitors/images/favi.png" sizes="32x32">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="assets-visitors/bootstrap/css/bootstrap.min.css">
    <!-- ALL GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900" rel="stylesheet">
    <!-- FONT AWESOME CSS -->
    <link rel="stylesheet" href="assets-visitors/fonts/linear-fonts.css">
    <link rel="stylesheet" href="assets-visitors/fonts/font-awesome.css">
    <!-- OWL CAROSEL CSS -->
    <link rel="stylesheet" href="assets-visitors/owlcarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets-visitors/owlcarousel/css/owl.theme.css">
    <!-- LIGHTBOX CSS -->
    <link rel="stylesheet" href="assets-visitors/css/lightbox.min.css">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="assets-visitors/css/magnific-popup.css">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="assets-visitors/css/animate.min.css">
    <!-- MAIN STYLE CSS -->
    <link rel="stylesheet" href="assets-visitors/css/style.css">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="assets-visitors/css/responsive.css">
    <!-- DATE PICKER CSS -->
    <link rel="stylesheet" href="assets-visitors/css/datepicker.css">
</head>

<body>
    <!-- START PRELOADER -->
    <div class="preloader">
        <div class="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- / END PRELOADER -->

    <!-- START HOMEPAGE DESIGN AREA -->
    <header id="home" class="welcome-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- START LOGO DESIGN AREA -->
                        <div class="logo" >
                            <img src="{{URL::to('assets-visitors/images/lh2.svg')}}" alt="" style="width: 100px">

                            <a href="index.html">
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
                                        <li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a>
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
    <!-- / END HOMEPAGE DESIGN AREA -->

   <!-- START FUN FACTS DESIGN AREA -->
        <section id="funfacts" class="about-us-area section-padding">
            <div class="container">
                <div class="row">
                    @foreach($stats as $stat)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-project-complete">
                            <span class="fa fa-gavel"></span>
                            <h2 class="counter-num">{{$stat->count}}</h2>
                            <h6 class="text-muted">{{$stat->title}}</h6>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="single-project-complete">
                            <span class="fa fa-thumbs-o-up"></span>
                            <h2 class="counter-num">1265</h2>
                            <h6 class="text-muted">project completed</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-project-complete">
                            <span class="fa fa-smile-o"></span>
                            <h2 class="counter-num">1789</h2>
                            <h6 class="text-muted">Happy Clients</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-project-complete">
                            <span class="fa fa-trophy"></span>
                            <h2 class="counter-num">31</h2>
                            <h6 class="text-muted">Awards Won</h6>
                        </div>
                    </div> -->
                </div>
                <!-- /END FUN FACTS DESIGN AREA -->
            </div>
        </section>
            
    
        <!-- START ABOUT US DESIGN AREA -->
        <section id="about" class="about-us-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>About us</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- START ABOUT US TEXT DESIGN AREA -->
                <div class="col-md-12">
                    <div class="about-text wow fadeInUp" data-wow-delay=".2s">
                        <h2 class="text-center">Welcome to LegalHub</h2>
                            <i>{{$setting->motto}}</i>
                        {!!$setting->home_description!!}
                    </div>
                </div>
                <!-- / END ABOUT US TEXT DESIGN AREA -->
            </div>
        </div>
    </section>
    <!-- / END ABOUT US DESIGN AREA -->

    <!-- START SERVICES DESIGN AREA -->
    <section id="service" class="service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>our services</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <!-- START SINGLE SERVICES DESIGN AREA -->
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-service text-center">
                        <span class="fa fa-signal"></span>
                        <h4>{{$service->item->name}}</h4>
                        <p>{{$service->item->description}}</p>
                    </div>
                </div>
                <!-- / END SINGLE SERVICES DESIGN AREA -->
                @endforeach
               <!--  <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-service text-center">
                        <span class="fa fa-motorcycle"></span>
                        <h4>Personal Injury</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
               <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-service text-center">
                        <span class="fa fa-graduation-cap"></span>
                        <h4>Education Law</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-service text-center">
                        <span class="fa fa-users"></span>
                        <h4>Family Law</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-service text-center last-service-item">
                        <span class="fa fa-bank"></span>
                        <h4>Bank &amp; Financial</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-service text-center last-service-item">
                        <span class="fa fa-briefcase"></span>
                        <h4>Corporate Law</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-service text-center last-service-item">
                        <span class="fa fa-hourglass-half"></span>
                        <h4>Industrial Law</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-service text-center last-service-item">
                        <span class="fa fa-medkit"></span>
                        <h4>Health Law</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                </div> -->
                <!-- / END SINGLE SERVICES DESIGN AREA -->
            </div>
        </div>
    </section>
    <!-- / END SERVICES DESIGN AREA -->

    <!-- START CALL TO ACTION AREA -->
    <section class="call-to-action-area" data-stellar-background-ratio="0.6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Do you want to purchase our template?</h2>
                    {{$setting->about_description}}
                    <a href="#" class="read-more white-read-more">Purchase now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- / END CALL TO ACTION AREA -->

    <!-- START PRICING DESIGN AREA -->
    <section id="pricing" class="pricing-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>our pricing</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- START SINGLE PRICING DESIGN AREA -->
                @foreach($services as $service)
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-table text-center wow fadeIn animated">
                        <h3 class="price-title">{{$service->item->name}}</h3>
                        <div class="price">
                            <h4>N{{$service->amount}}/<sub>{{$service->item->range}}</sub></h4>
                        </div>
                        <a href="#" class="read-more">BUY NOW</a>
                    </div>
                </div>
                @endforeach
                <!-- / END SINGLE PRICING DESIGN AREA -->
            </div>
        </div>
    </section>
    <!-- / END PRICING DESIGN AREA -->

    <!-- START OUR NEWSLETTER DESIGN AREA -->
    <section class="our-news-letter" data-stellar-background-ratio="0.6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>suscribe our news letter to get latest news</h2>
                    <input type="text" placeholder="Enter Your Email">
                    <input type="submit" value="Submit">
                </div>
            </div>
        </div>
    </section>
    <!-- / END OUR NEWSLETTER DESIGN AREA -->

    <!-- START BLOG DESIGN AREA -->
    <section id="blog" class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>our Latest News</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- START SINGLE BLOG DESIGN AREA -->
                @foreach($posts as $post)
                <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-blog">
                        <div class="meta-block-container">
                            <a title="Blog" href="single-blog.html">
                                <img alt="blog" src="{{URL($post->image)}}">
                            </a>
                        </div>
                        <div class="blog-description text-center">
                            <a href="single-blog.html"><h3>this is an image post</h3></a>
                            <div class="post-meta-block">
                                <div class="post-date"><a href="#"><i class="fa fa-calendar"></i> 13 May 2017</a></div>
                                <div class="post-comment"><a href="#"><i class="fa fa-comment"></i> 2</a></div>
                            </div>
                            <p>{{$post->excerpt}}</p>
                            <a href="single-blog.html" class="read-more">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- / END BLOG DESIGN AREA -->

    <!--====== Portfolio Start ======-->
    <section id="portfolio" class="contact-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Freqently Asked Questions (FAQs)</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Title -->

                <h2 class="title"></h2>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach($faqs as $faq)
                <div class="card">
                    <div class="card-header" id="heading{{$faq->id}}">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne">
                                {{$faq->question}}
                            </button>
                        </h2>
                    </div>
                    @if ($loop->first)
                    <div id="collapse{{$faq->id}}" class="collapse show" aria-labelledby="heading{{$faq->id}}" data-parent="#accordionExample">
                    @else
                    <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordionExample">
                    @endif
                        <div class="card-body">
                            {{$faq->answer}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Portfolio End ======-->

    <!-- START CONTACT DESIGN AREA -->
    <section id="contact" class="contact-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>contact us</h2>
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row contact-form-design-area wow fadeInUp">
                <!-- START CONTACT FORM DESIGN AREA -->
                <div class="col-md-12">
                    <div class="contact-form">
                        <div class="row">
                            <form action="{{route('store.contact')}}" method="post">
                                <div class="form-group col-md-6">
                                    <p>Name</p>
                                    <input type="text" name="name" class="form-control" id="first-name" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <p>Email</p>
                                    <input type="email" name="email" class="form-control" id="email" required="required">
                                </div>
                                <div class="form-group col-md-12">
                                    <p>Phone Number</p>
                                    <input type="text" name="phone" class="form-control" id="subject" required="required">
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <p>Select your service</p>
                                    <select id="select-service" name="select_service" class="form-control" required="" aria-required="true" aria-invalid="true">
                                        <option value="">- Select Your Service -</option>
                                        <option value="Family Law">Family Law</option>
                                        <option value="Bank & Financial Law">Bank & Financial Law</option>
                                        <option value="Corporate Law">Corporate Law</option>
                                        <option value="Employment Law">Employment Law</option>
                                        <option value="Personal Injury">Personal Injury</option>
                                        <option value="Capital Market">Capital Market</option>
                                        <option value="Criminal Law">Criminal Law</option>
                                        <option value="Civil Law">Civil Law</option>
                                        <option value="Human Rights">Human Rights</option>
                                        <option value="Real Estate Law">Real Estate Law</option>
                                        <option value="International Law">International Law</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <p>message</p>
                                    <textarea rows="6" name="message" class="form-control" id="description" required="required"></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button>Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / END CONTACT DESIGN AREA -->
    
    <section id="quick-contact" class="quick-contact-area">
        <div class="container">
            <div class="row">
                <div class="contact-details-area wow fadeInUp" data-wow-delay=".2s">
                    <div class="col-md-4 col-sm-12">
                        <div class="single-contact-details text-center">
                            <span class="lnr lnr-phone-handset"></span>
                            <h4>phone</h4>
                            <p class="text-muted">{{$web->phone_number_1}}</p>
                            <p class="text-muted">{{$web->phone_number_2}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="single-contact-details text-center">
                            <span class="lnr lnr-envelope"></span>
                            <h4>E-mail</h4>
                            <p class="text-muted">{{$web->email_1}}</p>
                            <p class="text-muted">{{$web->email_2}}</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="single-contact-details text-center">
                            <span class="lnr lnr-map-marker"></span>
                            <h4>Address</h4>
                            <p class="text-muted">{{$web->address_1}}</p>
                            <p class="text-muted">{{$web->address_2}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- START FOOTER DESIGN AREA -->
    <footer class="footer-area wow fadeInUp" data-wow-delay="1s">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="footer-social-link text-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <span class="title-divider">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                    </span>
                    <div class="footer-text">
                        <h6>&copy;copyright | LegalHub {{date('Y')}}</h6>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- / END CONTACT DETAILS DESIGN AREA -->

    <!-- START SCROOL UP DESIGN AREA -->
    <div class="scroll-to-up">
        <div class="scrollup">
            <span class="lnr lnr-chevron-up"></span>
        </div>
    </div>
    <!-- / END SCROOL UP DESIGN AREA -->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- LOCAL COPY OF LATEST JQUERY -->
    <script type="text/javascript" src="assets-visitors/js/jquery.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="assets-visitors/bootstrap/js/bootstrap.min.js"></script>
    <!-- PROGRESS JS  -->
    <script src="assets-visitors/js/jquery.appear.js"></script>
    <!-- OWL CAROUSEL JS  -->
    <script src="assets-visitors/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- MIXITUP JS -->
    <script src="assets-visitors/js/jquery.mixitup.js"></script>
    <!-- MAGNIFICANT JS -->
    <script src="assets-visitors/js/jquery.magnific-popup.min.js"></script>
    <!-- STEALLER JS -->
    <script src="assets-visitors/js/jquery.stellar.min.js"></script>
    <!-- YOUTUBE JS -->
    <script src="assets-visitors/js/jquery.mb.YTPlayer.min.js"></script>
    <script type="text/javascript">
        $('.player').mb_YTPlayer();
    </script>
    <!-- COUNTER UP JS -->
    <script src="assets-visitors/js/jquery.waypoints.min.js"></script>
    <script src="assets-visitors/js/jquery.counterup.min.js"></script>
    <!-- LIGHTBOX JS -->
    <script src="assets-visitors/js/lightbox.min.js"></script>
    <!-- WOW JS -->
    <script src="assets-visitors/js/wow.min.js"></script>
    <!-- scripts js -->
    <script src="assets-visitors/js/scripts.js"></script>
    <!-- DATE PICKER JS -->
    <script src="assets-visitors/js/jquery-ui.js"></script>
</body>

</html>