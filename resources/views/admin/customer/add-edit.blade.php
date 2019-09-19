@extends('layouts.app')

@section('title') Add Customer @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $id != NULL ? 'Update' : 'Add' }} Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="active">Customer Management</li>
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

      <div class="row">
        <div class="col-md-12">
          <p>
            <a href="{{ route('customers') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Customers</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Customer Information</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">   
                  @include('includes.success')
                  @include('includes.error')
                  @include('includes.errors')
                  <form action="{{ route('store.customer') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="form-group">
                      <label for="customer">Customer Name</label>
                      <input type="text" name="customer" id="customer"  value="{{ $customer != NULL ? $customer->customer : NULL }}" class="form-control" placeholder="Customer" required>
                    </div>
                    <div class="form-group">
                      <label for="address">Customer Address</label>
                      <input type="text" name="address" id="address" value="{{ $customer != NULL ? $customer->address : NULL }}" class="form-control" placeholder="Customer Address" required>
                    </div>
                    <div class="form-group">
                      <label for="note">Customer Note</label>
                      <input type="text" name="note" id="note" value="{{ $customer != NULL ? $customer->note : NULL }}" class="form-control" placeholder="Customer Note" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $id != NULL ? 'Update' : 'Add' }} Customer</button>
                      <a href="{{ route('customers') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> --}}
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

