  <!--Start sidebar-wrapper-->

<div id="sidebar-wrapper" data-simplebar="init" data-simplebar-auto-hide="true" class="active"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 364px;"></div></div><div class="simplebar-track horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
     <div class="brand-logo">
      <a href="/home">
       <img src="{{URL::to('assets-visitors/images/lh2.svg')}}" class="logo-icon" height="50px" alt="logo icon">
       <h5 class="logo-text">LEGALHUB</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol in">
      @if(auth()->user()->role_id == 1)
      <li class="sidebar-header">ADMIN NAVIGATION</li>
      <li>
        <a href="{{route('home')}}" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span></i>
        </a>
      </li>
      
      <li>
        <a href="#" class="waves-effect">
          <i class="icon-home"></i> <span>Activities</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> All Users </a></li>
          <!-- <li><a href="{{route('role.index')}}"><i class="fa fa-circle-o"></i> All Roles </a></li>
          <li><a href="{{route('roleDiscount.index')}}"><i class="fa fa-circle-o"></i> Role Discount </a></li>
          <li><a href="{{route('discount.index')}}"><i class="fa fa-circle-o"></i> Users Discounts </a></li>  -->
          <li><a href="{{route('requests.index')}}"><i class="fa fa-circle-o"></i> All Service Orders </a></li>
          <li><a href="{{route('subscribers.index')}}"><i class="fa fa-circle-o"></i> News Subscriptions </a></li> 
          <li><a href="{{route('contacts.index')}}"><i class="fa fa-circle-o"></i>Contacts</a></li>        
        </ul>
      </li>

      <li>
        <a href="#" class="waves-effect">
          <i class="icon-home"></i> <span>Website Content</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{route('setting')}}"><i class="fa fa-circle-o"></i> Web Content </a></li>
          <li><a href="{{route('faq.index')}}"><i class="fa fa-circle-o"></i> FAQs Content </a></li>
          <li><a href="{{route('count.index')}}"><i class="fa fa-circle-o"></i> Counter Content </a></li>
          <li><a href="{{route('slider.index')}}"><i class="fa fa-circle-o"></i> Slider Content </a></li>
          <li><a href="{{route('partner.index')}}"><i class="fa fa-circle-o"></i> Partner Content </a></li>
          <li><a href="{{route('posts.index')}}"><i class="fa fa-circle-o"></i> Post Content </a></li>
          <!-- <li><a href="{{route('setting')}}"><i class="fa fa-circle-o"></i> Web Details </a></li> -->
        </ul>
      </li>

      @endif


      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fa fa-book"></i>{{ __('Logout') }}
        </a>
      </li>
     
    </ul>
   
   </div></div></div>