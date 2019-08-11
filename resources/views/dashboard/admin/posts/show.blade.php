
@extends('layouts.admin')
@section('content')
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">News Detail</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">News Detail</li>
        </ol>
    </div>
</div>
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>News posts</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input-13">Title</label>
                        <h6>{{$post->title}}</h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-13">Short Description</label>
                        <p>{{$post->excerpt}}</p>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="input-13"> Image</label><br>
                        <img src="{{URL::to($post->image)}}" class="img-responsive" width="200">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="input-13">Description</label>
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
                <br><br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <a href="{{route('posts.edit', $post->id)}}" type="submit" class="btn btn-primary bg-white text-info shadow px-5"><i class="icon-lock"></i> Edit post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('dashboard.partials._datatablesjs')
@endsection
@section('stylesheets')
@include('dashboard.partials._datatablescss')
@endsection