@extends('layouts.app')

@section('title') Audit Trail @endsection

@section('script')
  <script src="{{ asset('js/sweetalert.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Audit Trail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-history"></i> Home</a></li>
        <li class="active">Audit Trail</li>
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
            
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Audit Trail</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" onclick="reloadDatatables()"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="audit-trail" class="table table-striped table-bordered" style="width: 99%">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Action Made</th>
                      <th>Date &amp; Time</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.table-responsive -->
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

  // Data Tables Load All
  $(document).ready(function() {
    $('#audit-trail').DataTable({
        ajax: { 
          url: "{{ route('all.logs') }}",
          dataSrc: ""
        },
        columns: [
          { data: 'user' },
          { data: 'action' },
          { data: 'date_time' },
        ]
     });
  });


  // reload databable 
  function reloadDatatables() {
    var table = $('#users').DataTable();
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

