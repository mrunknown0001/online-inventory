@extends('layouts.app')

@section('title') Accomplished Activities @endsection

@section('script')
  <script src="{{ asset('js/sweetalert.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accomplished Activities
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-info"></i> Home</a></li>
        <li class="active">Public Information</li>
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
            <a href="{{ route('public.info') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Public Information</a>
            <a href="{{ route('add.previous.activity.image') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Image</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Accomplished Activities</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" onclick="reloadDatatables()"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="activities" class="table table-striped table-bordered" style="width: 99%">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Date &amp; Time Uploaded</th>
                      <th>Action</th>
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
  // View Sweet Alert Function
  $(document).on('click', '#view', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      Swal.fire({
        title: 'View User Info?',
        text: "",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continue'
      }).then((result) => {
        if (result.value) {
          // update
          window.location.replace("/admin/user/info/" + id);
        }
        else {
          Swal.fire({
            title: 'View User Info Cancelled',
            text: "",
            type: 'info',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ok'
          });
        }
      });
  });



  // Data Tables Load All
  $(document).ready(function() {
    $('#activities').DataTable({
        ajax: { 
          url: "{{ route('all.previous.activities') }}",
          dataSrc: ""
        },
        columns: [
          { data: 'image' },
          { data: 'uploaded' },
          { data: 'action' },
        ]
     });
  });


  // reload databable 
  function reloadDatatables() {
    var table = $('#activities').DataTable();
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

