
    <div class="scroll-to-up">
        <div class="scrollup">
            <span class="lnr lnr-chevron-up"></span>
        </div>
    </div>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{URL::to('assets-visitors/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.appear.js')}}"></script>
    <script src="{{URL::to('assets-visitors/owlcarousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.mixitup.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.stellar.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <script type="text/javascript">
        $('.player').mb_YTPlayer();
    </script>
    <script src="{{URL::to('assets-visitors/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery.counterup.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/lightbox.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/wow.min.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/scripts.js')}}"></script>
    <script src="{{URL::to('assets-visitors/js/jquery-ui.js')}}"></script>

    
 <script type="text/javascript" src="{{ URL::to('js/toastr.min.js') }}"></script>

<script type="text/javascript">
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>

<script type="text/javascript">
    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif
</script>

 <script type="text/javascript">
    @if(Session::has('danger'))
        toastr.danger("{{ Session::get('danger') }}");
    @endif
</script>
