@extends('layouts.app')

@section('title') Add Shipping Permit @endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $id != NULL ? 'Update' : 'Add' }} Shipping Permit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-truck"></i> Home</a></li>
        <li class="active">Shiping Permit</li>
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
            <a href="{{ route('shipping.permits') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Shipping Permit</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">   
                  @include('includes.success')
                  @include('includes.error')
                  @include('includes.errors')
                  <form action="{{ route('post.add.shipping.permit') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="shippers_name">Shipper's Name</label>
                          <input type="text" name="shippers_name" id="shippers_name" class="form-control" placeholder="Shipper's Name" required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="shippers_address">Shipper's Address</label>
                          <input type="text" name="shippers_address" id="shippers_address" class="form-control" placeholder="Shipper's Address" required>
                          
                        </div>
                        <div class="form-group">
                          <label for="origin">Origin</label>
                          <select name="origin" id="origin" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                            @if(count($farms) > 0)
                              @foreach($farms as $f)
                                <option value="{{ encrypt($f->farm_id) }}">{{ $f->name }}</option>
                              @endforeach                        
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="destination">Destination</label>
                          <input type="text" name="destination" id="destination" class="form-control" placeholder="Destination" required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="destination_address">Destination Address</label>
                          <input type="text" name="destination_address" id="destination_address" class="form-control" placeholder="Destination Address" required>
                          
                        </div>                        
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="valid_until">Valid Until</label>
                          <input type="date" name="valid_until" id="valid_until" class="form-control" placeholder="" required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="live_stock_handlers_no">Livestock Handler's No.</label>
                          <input type="text" name="live_stock_handlers_no" id="live_stock_handlers_no" class="form-control" placeholder="Livestock Handler's No." required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="shippers_contact_no">Shipper's Contact No.</label>
                          <input type="text" name="shippers_contact_no" id="shippers_contact_no" class="form-control" placeholder="Shipper's Contact No." required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="livestock_carrier">Livestock Carrier</label>
                          <input type="text" name="livestock_carrier" id="livestock_carrier" class="form-control" placeholder="Livestock Carrier" required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="vehicle_type">Vehicle Type</label>
                          <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" placeholder="Vehicle Type" required>
                          
                        </div> 
                        <div class="form-group">
                          <label for="plate_no">Plate Number</label>
                          <input type="text" name="plate_no" id="plate_no" class="form-control" placeholder="Plate Number" required>
                          
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inspected_by">Inspected By</label>
                          <input type="text" name="inspected_by" id="inspected_by" class="form-control" placeholder="Inspected By" required>
                          
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="approved_by">Approved By</label>
                          <input type="text" name="approved_by" id="approved_by" class="form-control" placeholder="Approved By" required>
                          
                        </div> 
                      </div>
                    </div>


                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $id != NULL ? 'Update' : 'Add' }} Shipping Permit</button>
                      <a href="{{ route('shipping.permits') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
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

