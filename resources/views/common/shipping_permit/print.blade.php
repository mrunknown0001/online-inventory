@extends('layouts.print')

@section('title') Shipping Permit @endsection


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <h1>
        Shipping Permit
      </h1> --}}
      <ol class="breadcrumb">
        <li><a href="{{ route('landing.page') }}"><i class="fa fa-truck"></i> Home</a></li>
        <li class="active">Shipping Permit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

      </div>
      <!-- /.row -->
      <div id="printArea">
        <div class="row">
          <div class="col-md-4">
            <img src=""/>
          </div>
          <div class="col-md-4">
            
          </div>
          <div class="col-md-4">
            <p>Permit No: <strong>{{ $permit->permit_no }}</strong></p>
          </div>
        </div>
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

