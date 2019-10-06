@extends('layouts.app')

@section('title') User Management @endsection

@section('script')
  <script src="{{ asset('js/sweetalert.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Home</a></li>
        <li class="active">User Management</li>
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
            <a href="{{ route('add.user') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List of Users</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" onclick="reloadDatatables()"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="users" class="table table-striped table-bordered" style="width: 99%">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Fullname</th>
                      <th>User Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.table-responsive -->
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


  // Update User Info
  $(document).on('click', '#update', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
      title: 'Update User Info?',
      text: "",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continue'
    }).then((result) => {
      if (result.value) {
        // update
        window.location.replace("/admin/user/update/info/" + id);
      }
      else {
        Swal.fire({
          title: 'Update User Info Cancelled',
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

  // Remove user
  $(document).on('click', '#remove', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
      title: 'Remove User Info?',
      text: "",
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continue'
    }).then((result) => {
      if (result.value) {
        // update
        const Http = new XMLHttpRequest();
        const url='/admin/user/remove/' + id;
        Http.open("GET", url);
        Http.send();
        Http.onreadystatechange=(e)=>{
          // console.log(Http)
          if(Http.readyState === 4) {
            if(Http.status === 200) {
              Swal.fire({
                title: 'User Removed!',
                text: "",
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ok'
              });

              var table = $('#users').DataTable();
              table.ajax.reload(); 

            }
            else {
              Swal.fire({
                title: 'Error',
                text: "Please Try Again",
                type: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ok'
              });

              var table = $('#users').DataTable();
              table.ajax.reload(); 
            }
          }
        }

      }
      else {
        Swal.fire({
          title: 'User Removal Cancelled',
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
      $('#users').DataTable({
          ajax: { 
            url: "{{ route('all.users') }}",
            dataSrc: ""
          },
          columns: [
            { data: 'username' },
            { data: 'fullname' },
            { data: 'user_type' },
            { data: 'action'},
          ]
       });
  } );


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

