@extends('layouts.admin')

@section('content')
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
  <h4 class="page-title">All Company Partners</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Company Partners</li>
   </ol>
</div>
@include('backend.partials._errors')

<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><i class="fa fa-table"></i> Banner Sliders
      </div>

      <div class="card-body">
        <div class="table-responsive">
        <table id="example" class="table table-bordered">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

              @foreach($sliders as $slider)
              <tr>
                  <td>{{ str_limit($slider->title, $limit = 20, $end = '...') }}</td>
                  <td>{{ str_limit($slider->description, $limit = 20, $end = '...') }}</td>
                  <td><img src="{{URL::to($slider->image)}}" alt="" width="50px"></td>
                  <td>
                    <a href="{{route('slider.delete', $slider->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
          </tfoot>
      </table>
      </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Slider</div>
        <hr>

        <form class="color-form" method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input-13">Title</label>
              <input type="text" name="name" class="form-control form-control-rounded" maxlength="150" required >
            </div>

            <div class="form-group col-md-12">
              <label for="input-13">Description</label>
              <input type="text" name="description" class="form-control form-control-rounded" maxlength="150" required >
            </div>

            <div class="form-group col-md-12">
              <label for="input-13">Image</label>
              <input type="file" name="image" class="form-control form-control-rounded" required >
            </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Create Slider Content</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- End Row-->

@endsection

@section('scripts')

@include('backend.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('backend.partials._datatablescss')
@endsection
