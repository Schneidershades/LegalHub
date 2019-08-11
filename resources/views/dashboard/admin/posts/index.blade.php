
@extends('layouts.admin')
@section('content')
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">News</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
        </ol>
    </div>

    <div class="col-sm-3">
        <div class="btn-group float-sm-right">
            <a href="{{route('posts.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create post</button></a>
        </div>
    </div>
</div>
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> News</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td><img src="{{URL::to($post->image)}}" class="img-responsive" width="40"></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                                    <a href="{{route('posts.delete', $post->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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