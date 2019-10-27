@extends('layouts.app')

@section('title') Barangay Item Delivered @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barangay Item Delivered
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="active">Barangay Management</li>
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
            <a href="{{ route('barangays') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Barangay Management</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Barangay Information</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p><strong>{{ $barangay->name }}</strong></p>

                  @if(count($items) > 0)
                    <table class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Item</th>
                          <th>Item Code</th>
                          <th>Delivered</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($items as $i)
                          <tr>
                            <td>{{ $i->item->item_name }}</td>
                            <td>{{ $i->item->item_code }}</td>
                            <td>{{ $i->count }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @else 
                    <p class="text-center"><strong>No Delivered Item on this Barangay</strong></p>
                  @endif
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

