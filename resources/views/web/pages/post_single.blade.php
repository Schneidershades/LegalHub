@extends('layouts.web')

@section('meta_description', $post->title)
@section('meta_keywords', $post->title)

@section('header')
<header class="single-blog-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo" >
                        <img src="{{URL::to('assets-visitors/images/lh2.svg')}}" alt="" style="width: 100px">
                        <a href="/">
                            <p>Legal Hub</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
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
                                        <a class="smoth-scroll" href="/">Back to Home <div class="ripple-wrapper"></div>
                                        </a>
                                    </li>
                                    <li><a class="smoth-scroll" href="">Posts</a>
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
    <div class="single-blog-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>single blog</h2>
                    <span class="title-divider">
                        <i class="fa fa-gavel" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="single-blogarea section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-blog-details wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                    <h3 class="text-center">{{$post->title}}</h3>
                    <img src="{{URL::to($post->image)}}" class="img-responsive" alt="">
                    <div class="single-blog-meta-container">
                        <div class="post-meta-block">
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i> {{$post->created_at->format('d')}} {{$post->created_at->format('M')}}, {{$post->created_at->format('Y')}}</a></div>
                            <div class="post-comment"><a href="#"><i class="fa fa-comment"></i>{{$post->comments->count()}} </a></div>
                        </div>
                    </div>
                    {!! $post->content !!}
                    <!-- <div class="blog-social-sharing-area">
                        <div class="social-sharing-icon text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="comment-section wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                    <h4>Recent Comments</h4>
                     @if($post->comments->count() > 0)
                        @foreach($post->comments as $comment)
                        <div class="single-comment">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img ssrc="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}">
                                    <h6 class="text-muted text-center">{{ $comment->name }}</h6>
                                </div>
                                <div class="col-md-9">
                                    <h6 class="text-muted"><i class="fa fa-calendar"></i>{{date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</h6>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    @else
                        <div class="single-comment">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h4 class="text-muted text-center">No Comments</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="contact-form wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                    <h3 class="contact-title">Give your comment Here</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <div class="row">
                                    <form action="{{route('comment.store', $post->id)}}" method="post">
                                        @csrf
                                        <div class="form-group col-md-6">
                                            <p>Name</p>
                                            <input type="text" name="name" class="form-control" name="name" id="first-name" required="required">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <p>email</p>
                                            <input type="email" name="email" class="form-control" name="email" id="email" required="required">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <p>message</p>
                                            <textarea rows="6" name="message" class="form-control" name="comment" id="description" required="required"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <button>add comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s" data-wow-offset="0">
                <div class="recent-post single-sidebar">
                    <h4>
                        Recent Post
                        <span class="title-divider">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                        </span>
                    </h4>
                    @if($side_posts->count() > 0)
                        @foreach($side_posts as $post)
                        <div class="recent-single">
                            <a href="#"><img src="{{URL::to($post->image)}}" class="img-responsive" alt="image">
                            </a>
                            <a href="#"><h4>{{$post->title}}</h4></a>
                            <span>
                                <h6 class="text-muted"><i class="fa fa-calendar"></i> 
                                {{$post->created_at->format('d')}} {{$post->created_at->format('M')}}, {{$post->created_at->format('Y')}} <i class="fa fa-comment"></i> 3.</h6>
                            </span>
                        </div>
                        @endforeach
                    @else
                        <div class="recent-single">
                            <a href="#"><h4>No Posts Available</h4></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection