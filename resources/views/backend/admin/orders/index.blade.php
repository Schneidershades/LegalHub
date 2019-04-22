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
@include('backend.partials._errors')

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
                  @if($transaction->status == 'pending')
                     <!-- <form action="{{route('pay')}}" method="post">
                        @csrf
                        <input id="amount" type="hidden" name="amount" value="{{ $transaction->amount * 100 }}">
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                        <input type="hidden" name="transaction_ref" value="{{$transaction->identifier}}">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['transaction_id' => $transaction->identifier,]) }}">
                        <button class="btn btn-success btn-round waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-money"></i></button>
                    </form> -->

                    <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                        @csrf
                        <input type="hidden" name="amount" value="{{$transaction->amount }}" /> <!-- Replace the value with your transaction amount -->
                        <input type="hidden" name="payment_method" value="both" /> <!-- Can be card, account, both -->
                        <input type="hidden" name="description" value="Beats by Dre. 2017" /> <!-- Replace the value with your transaction description -->
                        <input type="hidden" name="country" value="NG" /> <!-- Replace the value with your transaction country -->
                        <input type="hidden" name="currency" value="NGN" /> <!-- Replace the value with your transaction currency -->
                        <input type="hidden" name="email" value="{{Auth::user()->email}}" /> <!-- Replace the value with your customer email -->
                        <input type="hidden" name="firstname" value="{{Auth::user()->email}}" /> <!-- Replace the value with your customer firstname -->
                        <input type="hidden" name="lastname" value="{{Auth::user()->email}}" /> <!-- Replace the value with your customer lastname -->
                        <input type="hidden" name="phonenumber" value="090123456789" /> <!-- Replace the value with your customer phonenumber -->
                        <input type="hidden" name="ref" value="{{$transaction->identifier}}" /> <!-- Ucomment and  Replace the value with your transaction reference. It must be unique per transaction. You can delete this line if you want one to be generated for you. --> 
                        <button class="btn btn-success btn-round waves-effect waves-light m-1"> <i aria-hidden="true" class="fa fa-money"></i></button>
                    </form>   
                  @endif

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

@include('backend.partials._datatablesjs')

@endsection


@section('stylesheets')

@include('backend.partials._datatablescss')
@endsection
