@extends('layouts.app')

@section('title') Change Password @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        {{-- <small>Version 2.0</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>

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
                </div>
                <div class="col-md-6">
                  <form action="{{ route('post.employee.change.password') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                      <label>Old Password</label>
                      <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old Password" required>
                    </div>
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                      <label>Re-Enter New Password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Enter New Password" required>
                    </div>
                    <div class="form-group">
                      <button type="subit" class="btn btn-primary"><i class="fa fa-save"></i> Change Password</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
            <!-- /.box-footer -->
          </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

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

