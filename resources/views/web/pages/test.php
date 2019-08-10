@extends('layouts.web')

@section('content')
<!--====== Hero Start ======-->
<section class="hero-area pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Hero Wrapper -->
                <div class="hero-wrapper mt-30 m-mt-30 mg-mt-30">
                    <!-- Hero Text -->
                    <div class="hero-text">
                        <h1>Welcome<br>To <br>Legal Hub Tech</h1>
                        <p>{{$setting->motto}}</p>
                    </div>
                    <!-- Button Wrapper -->
                    <div class="btn-wrapper">
                        <a href="#" class="btn btn-md btn-basic">All Services <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Alpha Image -->
                <figure class="alpha-img mt-30 m-mt-30 mg-mt-30">
                    <!-- Hero Carousel -->
                    <div id="hero-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                         <div class="carousel-inner">
                            @foreach($sliders as $slider)
                            @if ($loop->first)
                            <div class="carousel-item active">
                            @else
                            <div class="carousel-item">
                            @endif
                                <img src="{{$slider->image}}" alt="{{$slider->title}}" class="img-fluid target alpha-target">
                            </div>
                            @endforeach
                        </div>
                        <!-- Video Play Button -->
                        <!-- <div class="video-play-wrapper">
                            <div class="video-btn">
                                <a id="youtube_video" href="https://www.youtube.com/watch?v=OHAWwaYu2H0">
                                    <i class="ti-control-play"></i>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </figure>
            </div>
        </div>
    </div>
</section>
<!--====== Hero End ======-->

<!--====== About Start ======-->
<section id="about" class="about pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- About Left Image -->
                <div class="about-left">
                    <!-- About Image -->
                    <figure class="about-img wow slideInLeft">
                        <img src="{{$setting->about_image}}" alt="About Image" class="img-fluid">
                    </figure>
                    <!-- About Tag -->
                    <div class="about-tag cus-animated bounce">
                        <h5>We are at <br>your Service</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about-right">
                     <!-- Title Block -->
                    <div class="title-block">
                        <!-- Inner Items -->
                        <div class="inner-items">
                            <h2>Welcome! To Website<br>And Also To Our Office</h2>
                            <i>{{$setting->motto}}</i>
                            {!!$setting->home_description!!}
                            <!-- Button Wrapper -->
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-md btn-basic">Let's Start <span class="ti-arrow-right"></span></a>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== About End ======-->

<!--====== Service Start ======-->
<section id="service" class="service pt-90 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Title -->
            <h2 class="title">We Provide<br>These Services</h2>
        </div>

        <div class="row">
            @foreach($services as $service)
            <div class="col-sm-6 col-md-6 col-lg-4">
                <!-- Service Wrapper -->
                <div class="service-wrapper wow fadeIn">
                    <!-- Icon Block -->
                    <div class="icon-block">
                        <i class="flaticon-stats"></i>
                    </div>
                    <!-- Text Block -->
                    <div class="text-block">
                        <h5>{{$service->item->name}}</h5>
                        <h4>N{{$service->amount}}/<sub>{{$service->item->range}}</sub></h4>
                        <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p> -->
                    </div>
                    @if($service->item->slug == "business")
                        <a href="#" class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "private-limited-company")
                        <a href="{{route('company.create')}}" class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "public-limited-company")
                        <a href="{{route('company.create')}}" class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "company-limited-by-guarantee")
                        <a href="{{route('company.create')}}" class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "copyright")
                        <a href="{{route('copyright.create')}}"class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "ngo")
                        <a href="{{route('ngo.create')}}"class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "patent")
                        <a href="{{route('patent.create')}}"class="service-btn">Start<i class="ti-arrow-right"></i></a>
                        @elseif($service->item->slug == "trademark")
                        <a href="{{route('trademark.create')}}"class="service-btn">Start<i class="ti-arrow-right"></i></a>
                      @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-7">
                <!-- Alpha Image -->
                <figure class="alpha-img pt-90">
                    <img src="assets-visitors/images/service-left.jpg" alt="Hero Image" class="img-fluid target alpha-target wow slideInLeft">
                </figure>
            </div>
            <div class="col-md-5">
                <!-- Title Block -->
                <div class="title-block pt-90">
                    <!-- Inner Items -->
                    <div class="inner-items">
                        <h2>We Will Support your <br> Legal Businesses To Your Satisfaction</h2>
                        <p>{{$setting->about_description}}</p>
                        
                        <!-- Button Wrapper -->
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-md btn-basic">All Services <span class="ti-light-bulb"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Service End ======-->

<!--====== Portfolio Start ======-->
<section id="portfolio" class="portfolio pt-90 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Title -->
            <h2 class="title">Freqently Asked Questions<br>(FAQs)</h2>
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


<!--====== Counter Start ======-->
<section class="counter pt-90 pb-90">
    <div class="container">
        <!-- Counter Row -->
        <div class="row text-center counter-row">
            @foreach($stats as $stat)
            <div class="col-sm-6 col-md-6 col-lg-3">
                <!-- Icon Wrapper -->
                <div class="icon-wrapper">
                    <!-- Icon Block -->
                    <div class="icon-block">
                        <i class="{{$stat->icon}}"></i>
                    </div>
                </div>
                <!-- Counter Block -->
                <div class="counter-block m-mb-30 mg-mb-30 lg-mb-30">
                    <h3 class="count">{{$stat->count}}</h3>
                    <p>{{$stat->title}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--====== Counter End ======-->

<!--====== Partner Start ======-->
<section class="partner pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <!-- Partner Title Block -->
                <div class="partner-title">
                    <!-- Inner Items -->
                    <div class="inner-items">
                        <h2>We Work With</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-8">
                <!-- Carousel Start -->
                <div class="owl-carousel partner-carousel owl-theme">

                    @foreach($partners as $partner)
                    <!-- Carousel Item Wrapper Start -->
                    <div class="item-wrapper">
                        <!-- Carousel Item -->
                        <div class="item">
                            <!-- Item Image -->
                            <div class="item-img">
                                <img src="{{$partner->image}}" alt="Client 1" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Item Wrapper Start -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Partner End ======-->

<!--====== Contact Start ======-->
<section id="contact" class="contact pt-90 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Title -->
            <h2 class="title">Our Contact Email is<br>24/7 Open</h2>
        </div>
        <!-- Contact Form -->
        <form action="{{route('store.contact')}}" method="post" class="contact-form">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group mb-30">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Your Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Your Phone Number" required>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="form-group mb-30">
                        <label for="fullname">Email</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="message">Message Us</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Type Your Message" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-block mt-30 m-mt-30 mg-mt-30 lg-mt-30">
                        <button class="btn btn-basic" type="submit">Send Message <span class="ti-control-forward"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--====== Contact End ======-->

@endsection