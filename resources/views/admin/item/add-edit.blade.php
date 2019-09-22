@extends('layouts.app')

@section('title') Add Item @endsection

@section('style')
  {{-- <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
@endsection

@section('script')
  {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $id != NULL ? 'Update' : 'Add' }} Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="active">Item Management</li>
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
            <a href="{{ route('items') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Items</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Item Details</h3>

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
                  <form action="{{ route('store.item') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="form-group">
                      <label for="item">Item Name</label>
                      <input type="text" name="item" id="item"  value="{{ $item != NULL ? $item->item_name : NULL }}" class="form-control" placeholder="Item Name" required>
                    </div>
                    <div class="form-group">
                      <label for="code">Item Code</label>
                      <input type="text" name="code" id="code" value="{{ $item != NULL ? $item->code : NULL }}" class="form-control" placeholder="Item Code" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Item Description</label>
                      <input type="text" name="description" id="description" value="{{ $item != NULL ? $item->description : NULL }}" class="form-control" placeholder="Item Description" required>
                    </div>
                    <div class="form-group">
                      <label for="item_category">Item Category</label>
                      <select name="item_category" id="item_category" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                        @if(count($categories) > 0)
                          <option value="">Select Category...</option>
                          @foreach($categories as $c)
                            <option value="{{ encrypt($c->item_category_id) }}">{{ $c->item_category_name }}</option>
                          @endforeach
                        @else
                          <option value="">No Category</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="unit_of_measurement">Unit of Measurement</label>
                      <select name="unit_of_measurement" id="unit_of_measurement" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                        @if(count($units) > 0)
                          <option value="">Select Unit of Measurement...</option>
                          @foreach($units as $u)
                            <option value="{{ encrypt($u->unit_of_measurement_id) }}">{{ $u->code . ' - ' . $u->name }}</option>
                          @endforeach
                        @else
                          <option value="">No Unit of Measurement Available</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $id != NULL ? 'Update' : 'Add' }} Item</button>
                      <a href="{{ route('items') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
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

