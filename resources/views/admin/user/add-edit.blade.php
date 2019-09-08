@extends('layouts.app')

@section('title') Add User @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $id != NULL ? 'Update' : 'Add' }} User
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
              <h3 class="box-title">Fill User Information</h3>

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
                  <form action="{{ route('store.user') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username"  value="{{ $user != NULL ? $user->username : NULL }}" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label for="firstname">Firstname</label>
                      <input type="text" name="firstname" id="firstname" value="{{ $user != NULL ? $user->firstname : NULL }}" class="form-control" placeholder="Firstname" required>
                    </div>
                    <div class="form-group">
                      <label for="middlename">Middlename</label>
                      <input type="text" name="middlename" id="middlename" value="{{ $user != NULL ? $user->middlename : NULL }}" class="form-control" placeholder="Middlename">
                    </div>
                    <div class="form-group">
                      <label for="lastname">Lastname</label>
                      <input type="text" name="lastname" id="lastname" value="{{ $user != NULL ? $user->lastname : NULL }}" class="form-control" placeholder="Lastname" required>
                    </div>
                    <div class="form-group">
                      <label for="suffix">Suffix</label>
                      <input type="text" name="suffix" id="suffix" class="form-control" placeholder="Suffix">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email" value="{{ $user != NULL ? $user->email : NULL }}" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                      <label for="user_type">User Type</label>
                      <select name="user_type" id="user_type" class="form-control" required>
                        <option value="">Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">Employee</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $id != NULL ? 'Update' : 'Add' }} User</button>
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

