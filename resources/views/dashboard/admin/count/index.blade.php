@extends('layouts.admin')

@section('content')
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
  <h4 class="page-title">All Statistics Web Content</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Statistics Web Content</li>
   </ol>
</div>
@include('dashboard.partials._errors')

<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><i class="fa fa-table"></i> Service Users
        <!-- <span class=""><button type="submit" class="btn btn-link bg-success text-info shadow px-5"><i class="icon-lock"></i> Register</button></span> -->
      </div>

      <div class="card-body">
        <div class="table-responsive">
        <table id="example" class="table table-bordered">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Number</th>
                  <th>Icon</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

              @foreach($counts as $count)
              <tr>
                  <td>{{$count->title}}</td>
                  <td>{{$count->count}}</td>
                  <td>{{$count->icon}}</td>
                  <td>
                    <a href="{{route('count.delete', $count->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>Title</th>
                  <th>Number</th>
                  <th>Icon</th>
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
        <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Home Web content Stats</div>
        <hr>

        <form class="color-form" method="POST" action="{{route('count.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input-13">Title</label>
              <input type="text" name="title" class="form-control form-control-rounded" maxlength="150" required >
            </div>

            <div class="form-group col-md-12">
              <label for="input-13">Stats Number</label>
              <input type="number" name="count" class="form-control form-control-rounded" maxlength="150" required >
            </div>

            <div class="form-group col-md-12">
              <label for="input-13">Icon</label>
              <input type="text" name="icon" class="form-control form-control-rounded" maxlength="150" required>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Create Stats Content</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- End Row-->





@endsection

@section('scripts')

@include('dashboard.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('dashboard.partials._datatablescss')
@endsection
