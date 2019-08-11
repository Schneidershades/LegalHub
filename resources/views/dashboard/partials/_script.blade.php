
  <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::to('assets/js/jquery.min.js')}}"></script>
  <script src="{{ URL::to('assets/js/popper.min.js')}}"></script>
  <script src="{{ URL::to('assets/js/bootstrap.min.js')}}"></script>
	
  <!-- simplebar js -->
  <script src="{{ URL::to('assets/plugins/simplebar/js/simplebar.js')}}"></script>
  <!-- waves effect js -->
  <script src="{{ URL::to('assets/js/waves.js')}}"></script>
  <!-- sidebar-menu js -->
  <script src="{{ URL::to('assets/js/sidebar-menu.js')}}"></script>
  <!-- Custom scripts -->
  <script src="{{ URL::to('assets/js/app-script.js')}}"></script>
  
  <!-- Vector map JavaScript -->
  <script src="{{ URL::to('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{ URL::to('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Sparkline JS -->
  <script src="{{ URL::to('assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
  <!-- Chart js -->
  <script src="{{ URL::to('assets/plugins/Chart.js/Chart.min.js')}}"></script>
  <!--notification js -->
  <script src="{{ URL::to('assets/plugins/notifications/js/lobibox.min.js')}}"></script>
  <script src="{{ URL::to('assets/plugins/notifications/js/notifications.min.js')}}"></script>
  <!-- Index js -->
  <!-- <script src="{{ URL::to('assets/js/index.js')}}"></script> -->

  <!-- <script src="{{ URL::to('assets/plugins/notifications/js/lobibox.min.js')}}"></script> -->
  <!-- <script src="{{ URL::to('assets/plugins/notifications/js/notifications.min.js')}}"></script> -->
  <!-- <script src="{{ URL::to('assets/plugins/notifications/js/notification-custom-script.js')}}"></script> -->

  <script type="text/javascript">
        @if(Session::has('success'))
          function success_noti(){
            Lobibox.notify('success', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'fa fa-check-circle',
            msg: '{{ Session::get('success') }}'
            });
          }
          
        @endif

    </script>

    <script type="text/javascript">
        @if(Session::has('info'))
          function info_noti(){
            Lobibox.notify('info', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'fa fa-info-circle',
            msg: '{{ Session::get('info') }}'
            });
          }
        @endif
    </script>

     <script type="text/javascript">
        @if(Session::has('danger'))
            function error_noti(){
              Lobibox.notify('error', {
              pauseDelayOnHover: true,
              continueDelayOnInactiveTab: false,
              position: 'top right',
              icon: 'fa fa-times-circle',
              msg: '{{ Session::get('danger') }}'
              });
            }  
        @endif
    </script>

    <script type="text/javascript">
        @if(Session::has('info'))
          function default_noti(){
            Lobibox.notify('default', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: '{{ Session::get('info') }}'
            });
          }
        @endif
    </script>

    <script type="text/javascript">
        @if(Session::has('warning'))
          function warning_noti(){
            Lobibox.notify('warning', {
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'fa fa-exclamation-circle',
            msg: '{{ Session::get('warning') }}'
            });
          }
        @endif
    </script>

  @yield('scripts')