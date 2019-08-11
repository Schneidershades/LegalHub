@extends('layouts.admin')

@section('content')
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
  <h4 class="page-title">All FAQs</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javaScript:void();">LegalHub</a></li>
      <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">All FAQs</li>
   </ol>
</div>
@include('dashboard.partials._errors')

<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header"><i class="fa fa-table"></i> Service Users
      </div>

      <div class="card-body">
        <div class="table-responsive">
        <table id="example" class="table table-bordered">
          <thead>
              <tr>
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>

              @foreach($faqs as $faq)
              <tr>
                  <td>{{ str_limit($faq->question, $limit = 20, $end = '...') }}</td>
                  <td>{{ str_limit($faq->answer, $limit = 20, $end = '...') }}</td>
                  <td>
                    <a href="{{route('faq.edit', $faq->id)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                    <a href="{{route('faq.delete', $faq->id)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
          <tfoot>
              <tr>
                  <th>Question</th>
                  <th>Answer</th>
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
        <div class="card-title text-uppercase "><i class="fa fa-address-book-o"></i> Create your Faq</div>
        <hr>

        <form class="color-form" method="POST" action="{{route('faq.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input-13">Question</label>
              <input type="text" name="question" class="form-control form-control-rounded" maxlength="150" required >
            </div>

            <div class="form-group col-md-12">
              <label for="input-13">Answer</label>
              <textarea name="answer" id="" cols="30" rows="10" class="form-control form-control-rounded" required></textarea>
            </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Create FAQ Content</button>
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
