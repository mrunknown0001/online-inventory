@extends('layouts.app')

@section('title') Change Password @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
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
              <h3 class="box-title">Change Password For: {{ $user->firstname . ' ' . $user->lastname }}</h3>

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
                  <form action="{{ route('post.user.change.pass') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="form-group">
                      <label for="password">New Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Re-Enter New Password</label>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-Enter New Password" required>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Change Password</button>
                      <a href="{{ route('users') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
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

