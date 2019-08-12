@extends('layouts.web')

@section('header')
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
@endsection
@section('content')
<!-- START HOMEPAGE DESIGN AREA -->

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
        </div>
    </div>
</section>
<!-- / END SERVICES DESIGN AREA -->


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
                    <a href="#" href="#" data-toggle="modal" data-target="#myModal{{$service->id}}" class="read-more">Make Request</a>
                </div>
            </div>

            <div id="myModal{{$service->id}}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 150px">
                        <div class="modal-header">
                        <h4 class="modal-title">{{$service->item->name}} Request Order</h4>
                        </div>

                        <form method="post" action="{{route('store-service-request')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="d-flex flex-column flex-lg-row">
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="email" name="item_id" value="{{$service->item->id}} ">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="phone" placeholder="Your Phone number" required>
                                        </div>
                                        <div class="form-group ">
                                            <textarea class="form-control" id="message" name="comment" placeholder="Any inquiries about our services" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn--sm btn--dark btn--megaEffect ml-auto">SEND
                                            MESSAGE</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                         </form>
                    </div>
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
                <form action="{{route('subscribe')}}" method="post">
                    @csrf
                    <input type="email" placeholder="Enter Your Email" required>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- / END OUR NEWSLETTER DESIGN AREA -->
@if($posts->count() > 0)
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
                        <a title="Blog" href="{{route('news-details', $post->slug)}}">
                            <img alt="blog" src="{{URL($post->image)}}">
                        </a>
                    </div>
                    <div class="blog-description text-center">
                        <a href="{{route('news-details', $post->slug)}}"><h3>{{$post->title}}</h3></a>
                        <div class="post-meta-block">
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i> {{$post->created_at->format('D')}} {{$post->created_at->format('M')}}, {{$post->created_at->format('Y')}}</a></div>
                            <!-- <div class="post-comment"><a href="#"><i class="fa fa-comment"></i> 2</a></div> -->
                        </div>
                        <p>{{$post->excerpt}}</p>
                        <a href="{{route('news-details', $post->slug)}}" class="read-more">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

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
                                <input type="text" name="name" class="form-control" id="first-name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <p>Email</p>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group col-md-12">
                                <p>Phone Number</p>
                                <input type="text" name="phone" class="form-control" id="subject" required>
                            </div>
                            <div class="form-group col-md-12">
                                <p>message</p>
                                <textarea rows="6" name="message" class="form-control" id="description" required></textarea>
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
                        <p class="text-muted">{{$setting->phone_number_1}}</p>
                        <p class="text-muted">{{$setting->phone_number_2}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="single-contact-details text-center">
                        <span class="lnr lnr-envelope"></span>
                        <h4>E-mail</h4>
                        <p class="text-muted">{{$setting->email_1}}</p>
                        <p class="text-muted">{{$setting->email_2}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="single-contact-details text-center">
                        <span class="lnr lnr-map-marker"></span>
                        <h4>Address</h4>
                        <p class="text-muted">{{$setting->address_1}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
