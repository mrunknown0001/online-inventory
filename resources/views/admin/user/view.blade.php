@extends('layouts.app')

@section('title') User Information @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Information
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
            <a href="{{ route('users') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to User Management</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Information</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>Username</td>
                    <td>{{ $user->username }}</td>
                  </tr>
                  <tr>
                    <td>Fullname</td>
                    <td>{{ $user->lastname }}, {{ $user->firstname }} {{ $user->middlename }}</td>
                  </tr>
                  <tr>
                    <td>User Type</td>
                    <td>{{ $user->user_type == 1 ? 'Admin' : 'Employee' }}</td>
                  </tr>
                  <tr>
                    <td>Account Status</td>
                    <td>{{ $user->active == 1 ? 'Active' : 'Inactive' }}</td>
                  </tr>
                </table>
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

