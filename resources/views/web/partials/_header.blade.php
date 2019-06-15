<!--====== Header Start ======-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Navbar Area Start -->
                <nav class="navbar navbar-expand-lg navbar-light nav-container">
                    <!-- Logo Content -->
                    <a class="navbar-brand" href="#"><img src="{{URL::to('assets-visitors/images/lh2.svg')}}" height="50px" width="50px" alt="Logo" class="img-logo">LegalHub</a>
                    <!-- Responsive Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nabvarToggle" aria-controls="nabvarToggle" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Main Nav Start -->
                    <div class="main-nav collapse navbar-collapse" id="nabvarToggle">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" data-target="home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" data-target="about">About</a></li>
                            <li class="nav-item"><a class="nav-link" data-target="service">Service</a></li>
                            <li class="nav-item"><a class="nav-link" data-target="portfolio">FAQs</a></li>
                            <li class="nav-item"><a class="nav-link" data-target="testimonial">Testimonial</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" data-target="blog">Blog</a></li> -->
                            <li class="nav-item"><a class="nav-link" data-target="contact">Contact</a></li>
                            @guest
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle cta-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Account <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            {{ __('Register') }}
                                        </a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle cta-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Dashboard') }}
                                        </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--====== Header End ======-->

<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login/Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Login</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Register</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>