/*------------------------------------------------------------------
[Custom JS File]

Project:        Okoma - Business Consultancy HTML5 Template
Version:        1.0
Last change:    11/03/19
Author Name:    IdealWebGuru
-------------------------------------------------------------------*/


/*------------------------------------------------------------------
[Table of contents]


1. Preloader
2. Smooth Scroll
3. Counter On Scroll
4. Fix Header
5. Scroll To Top
6. Partner Carousel
7. Video Popup
8. Image Popup
9. Image Gallery Popup
10. Wow Initialization

-------------------------------------------------------------------*/


$(document).ready(function($){
    "use strict";

    // ---- Preloader


    $(window).on('load', function(e) { 
        e.preventDefault();
        $('#status').fadeOut(); 
        $('#preloader').delay(350).fadeOut('slow'); 
        $('body').delay(350).css({'overflow':'visible'});

        var value = jQuery(window).scrollTop();

        if ( value >= 50 ){
            $('.header').addClass('scrolled');
        }

        if ( value >= 200 ){
            $('.scrolled').addClass('fixed');
        }
    });


    //---- Smooth Scroll to Targeted Section


    $('.navbar-brand').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#home').offset().top
        }, 1000);
    });

    $('.navbar-nav .nav-item .nav-link').on('click',function() {
        $('.navbar-nav .nav-item a').removeClass('active');
        $(this).addClass('active');

        var target = $(this).data('target');

        if(target != 'home'){
            $('.header').addClass('scrolled fixed');
        }
        
        $('html, body').animate({
            scrollTop: $('#'+target).offset().top
        }, 1000);

    });


    // ---- Counter on scroll


    $(window).on('scroll', startCounter);
    
    function startCounter() {
        var hT = $('.counter-row').offset().top,
            hH = $('.counter-row').outerHeight(),
            wH = $(window).height();
        if ($(window).scrollTop() > hT+hH-wH) {
            $(window).off("scroll", startCounter);
            $('.count').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
        }
    }


    //---- Fix Header on scroll down


    $(window).on('scroll', function() {
        var value = $(window).scrollTop();
        if ( value >= 50 ){
            $('.header').addClass('scrolled');
        }
        else if ( value < 50 ){
            $('.header').removeClass('scrolled');
        }

        if ( value >= 200 ){
            $('.scrolled').addClass('fixed');
        }
        else if( value < 200 ){
            $('.scrolled').removeClass('fixed');
        }
    });
          
                
    // ---- Scroll To Top 


    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    

    // ---- Partner Carousel


    $(".partner-carousel").owlCarousel({
        autoplay: true,
        nav: false,
        loop: true,
        dots: false,
        margin: 30,
        smartSpeed:1000,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:true,
                stagePadding: 0,
                nav: false,
            },
            600:{
                items:2,
                nav:false
            },
            768:{
                items:3,
                nav:false,
                stagePadding: 0,
            },
            1000:{
                items:3,
                nav:false,
                loop:true,
            }
        }
    });
    

    // ---- Video Popup


    $('#youtube_video').magnificPopup({
        type: 'iframe',
        iframe: {
            patterns: {
                youtube: {
                index: 'youtube.com/',
            
                id: 'v=', 
            
                src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
          
            },
            srcAction: 'iframe_src',
        }
    });


    // ---- Image Popup

    $('.popup-img').magnificPopup({
        type: 'image'
    });


    // ---- Image Gallery Popup

    $('.popup-img-gal').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });


    // ---- Wow JS Initialization

    new WOW().init();


}(jQuery));