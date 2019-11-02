@extends('layouts.app')

@section('title') Items Management @endsection

@section('script')
  <script src="{{ asset('js/sweetalert.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Items Mamangement
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="active">Items Management</li>
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
            <a href="{{ route('inventories') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Inventory</a>

          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Intem Inventory Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" onclick="reloadDatatables()"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  Item: {{ $inv->item->item_name }}
                </div>
                <div class="col-md-6">
                  Item Code: {{ $inv->item->item_code }}
                </div>
                <div class="col-md-12">
                  Item Description: {{ $inv->item->item_description }}
                </div>
                <div class="col-md-12">
                  Category: {{ $inv->item->category->item_category_name }}
                </div>
                <div class="col-md-6">
                  Maximum Stock #: {{ $inv->item->max_stock }}
                </div>
                <div class="col-md-6">
                  Item Critical Percentage: {{ $inv->item->critical_level }}
                </div>
                <div class="col-md-6">
                  Stock Quantity: {{ $inv->quantity }}
                </div>
                <div class="col-md-6">
                  Status: {!! $status !!}
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

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
<script>

 
</script>
@endsection

