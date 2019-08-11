@extends('layouts.admin')

@section('content')
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
    <h4 class="page-title">All Registered Services </h4>
    <ol class="breadcrumb">
      <li class="breadcrumb-transaction"><a href="javaScript:void();">LegalHub</a></li>
      <li class="breadcrumb-transaction"><a href="javaScript:void();">Dashboard</a></li>
      <li class="breadcrumb-transaction active" aria-current="page">All Service transactions</li>
    </ol>
  </div>
  <div class="col-sm-3">
    <div class="btn-group float-sm-right">
      <a href="{{route('service.create')}}"><button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Create Service Details</button></a>
    </div>
  </div>
</div>
<!-- End Breadcrumb-->
@include('dashboard.partials._errors')

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header"><i class="fa fa-table"></i> Service transactions
        <!-- <span class=""><button type="submit" class="btn btn-link bg-success text-info shadow px-5"><i class="icon-lock"></i> Register</button></span> -->
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-bordered">
            <thead>
              <tr>
                <th>Created</th>
                <th>User</th>
                <th>ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Approved</th>
                <th>Payment Status</th>
                <th>Execution</th>
                <th>Modified</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transactions as $transaction)
              <tr>
                <td><span class="badge badge-danger m-2">{{$transaction->created_at}}</span></td>
                <td><span class="badge badge-danger m-2">{{$transaction->user->name}}</span></td>
                <td><span class="badge badge-success m-1">{{$transaction->identifier}}</span></td>
                <td><span class="badge badge-primary m-1">{{$transaction->transactionable_type}}</span></td>
                <td><span class="badge badge-dark m-1">N{{$transaction->amount}}</span></td>
                <td><span class="badge badge-warning m-1">{{$transaction->approval}}</span></td>
                <td><span class="badge badge-warning m-1">{{$transaction->status}}</span></td>
                <td><span class="badge badge-warning m-1">{{$transaction->execution}}</span></td>
                <td>{{$transaction->updated_at}}</td>
                <td>           

                  @if($transaction->transactionable_type == "Business")
                  <a href="{{route('business.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('business.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('business.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  @elseif($transaction->transactionable_type == "Company")
                   <a href="{{route('company.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('company.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('company.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  @elseif($transaction->transactionable_type == "Trademark")
                   <a href="{{route('trademark.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('trademark.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('trademark.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>

                  @elseif($transaction->transactionable_type == "Patent")
                   <a href="{{route('patent.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('patent.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('patent.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  @elseif($transaction->transactionable_type == "Copyright")
                   <a href="{{route('copyright.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('copyright.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('copyright.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  @elseif($transaction->transactionable_type == "NGO")
                   <a href="{{route('ngo.edit', $transaction->identifier)}}" class="btn btn-dark btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-edit"></i></a>
                  <a href="{{route('ngo.show', $transaction->identifier)}}" class="btn btn-warning btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-eye"></i></a>
                  <a href="{{route('ngo.delete', $transaction->identifier)}}" class="btn btn-danger btn-round waves-effect waves-light m-1"><i aria-hidden="true" class="fa fa-trash"></i></a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Created</th>
                <th>User</th>
                <th>ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Approved</th>
                <th>Payment Status</th>
                <th>Execution</th>
                <th>Modified</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
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
