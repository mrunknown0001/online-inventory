@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        {{-- <small>Version 2.0</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ $count }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory Items</span>
              <span class="info-box-number">{{ $items }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        {{-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Shipping Permits</span>
              <span class="info-box-number">12</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Transactions</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" ><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="transactions" class="table table-striped table-bordered" style="width: 99%">
                  <thead>
                  <tr>
                    <th>Transactions</th>
                    <th>Item</th>
                    <th>Date &amp; Time </th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{ route('transactions') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Transactions</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">

        </div>
        <div class="col-md-12">

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
  // Data Tables Load All
  $(document).ready(function() {
    $('#transactions').DataTable({
        ajax: { 
          url: "{{ route('latest.transactions') }}",
          dataSrc: ""
        },
        columns: [
          { data: 'transactions' },
          { data: 'details' },
          { data: 'date_time' },
        ]
     });
  });


  // reload databable 
  function reloadDatatables() {
    var table = $('#transactions').DataTable();
    table.ajax.reload();

    Swal.fire({
      title: 'Record Reloaded',
      text: "",
      type: 'info',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok'
    });
  }
 
</script>
@endsection

