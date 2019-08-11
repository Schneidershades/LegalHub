
@extends('layouts.admin')
@section('content')
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Edit News</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Realtiz</a></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit News</li>
        </ol>
    </div>
</div>
@include('dashboard.partials._errors')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Edit News</div>
            <div class="card-body">
                <form class="color-form" method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="input-13">Title</label>
                            <input type="text" name="title" class="form-control " maxlength="150" required  value="{{$post->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input-13">Short Description</label>
                            <input type="text" name="excerpt" class="form-control " maxlength="150" required  value="{{$post->excerpt}}">
                        </div>
                         <div class="form-group col-md-12">
                            <label for="input-13">Meta Keyword (SEO)</label>
                            <input type="text" name="meta_keyword" class="form-control " maxlength="150" required value="{{$post->meta_keyword}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-13">Meta Description (SEO)</label>
                            <input type="text" name="meta_description" class="form-control " maxlength="150" required value="{{$post->meta_description}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="input-13"> Image</label><br>
                            <input type="file" class="dropify" name="image" data-default-file="{{$post->image ? URL::to($post->image) : 'null'}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input-13">Description</label>
                            <textarea class="form-control" name="content" id="summernoteEditor" cols="30" rows="10">{{$post->content}}</textarea>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary bg-white text-info shadow px-5"><i class="icon-lock"></i> Save post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script src="{{URL::to('assets/js/dropzone.js')}}"></script> -->
<script src="{{URL::to('assets/js/dropify.js')}}"></script>

<script src="{{URL::to('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
   $('#summernoteEditor').summernote({
        height: 400,
        tabsize: 2
    });

   $('.dropify').dropify();
</script>
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
<link rel="stylesheet" href="{{ URL::to('assets/css/dropify.css')}}"/>
<!-- <link rel="stylesheet" href="{{ URL::to('assets/css/basic.css')}}"/> -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/summernote/dist/summernote-bs4.css')}}"/>
@endsection