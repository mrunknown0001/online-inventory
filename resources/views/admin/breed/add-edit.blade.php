@extends('layouts.app')

@section('title') Add Breed @endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/bootstrap-select.js') }}"></script>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $id != NULL ? 'Update' : 'Add' }} Breed
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-circle-o"></i> Home</a></li>
        <li class="active">Breed</li>
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
            <a href="{{ route('breeds') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Breeds</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Breed Details</h3>

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
                  <form action="{{ route('store.breed') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id != NULL ? encrypt($id) : NULL }}">
                    <div class="form-group">
                      <label for="animal">Animal</label>
                      <select name="animal" id="animal" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                        @if(count($animals) > 0)
                          <option value="">Select Animal...</option>
                          @foreach($animals as $a)
                            <option value="{{ encrypt($a->animal_id) }}">{{ $a->name }}</option>
                          @endforeach
                        @else
                          <option value="">No Animals</option>
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="breed">Breed</label>
                      <input type="text" name="breed" id="breed"  value="{{ $breed != NULL ? $breed->name : NULL }}" class="form-control" placeholder="Breed Name" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> {{ $id != NULL ? 'Update' : 'Add' }} Breed</button>
                      <a href="{{ route('breeds') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
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

