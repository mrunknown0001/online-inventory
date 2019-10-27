@extends('layouts.app')

@section('title') Outgoing Item @endsection

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
        Outgoing
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list"></i> Home</a></li>
        <li class="active">Inventory</li>
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
            <a href="{{ route('inventories') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Inventory</a>
          </p>
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fill Details</h3>

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
                  <form action="{{ route('store.outgoing.item') }}" method="POST" autocomplete="off">
                    @csrf
                    
                    <div class="form-group">
                      <label for="customer">Customer</label>
                      <select name="customer" id="customer" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                        {{-- @if(count($customers) > 0)
                          @foreach($customers as $c)
                            <option value="{{ encrypt($c->customer_id) }}">{{ $c->customer }}</option>
                          @endforeach
                        @endif --}}
                        @if(count($farms) > 0)
                          @foreach($farms as $f)
                            <option value="{{ encrypt($f->farm_id) }}">{{ $f->name }}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="reference_number">Reference Number</label>
                      <input type="text" name="reference_number" id="reference_number" class="form-control" placeholder="Reference Number" required>
                    </div>

                    <div class="form-group">
                      <label for="municipality_barangay">Municipality / Barangay</label>
                      <select name="municipality_barangay" id="municipality_barangay" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                        @foreach($municipalities as $m)
                          @foreach($m->barangays as $b)
                            <option value="{{ encrypt($b->barangay_id) }}">{{ $m->name }}/{{ $b->name }}</option>
                          @endforeach
                        @endforeach
                      </select>
                    </div>
        


                    {{-- Start of Item 1 --}}
                    <hr>
                    <h5>Item</h5>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="item1">Item</label>
                          <select name="item1" id="item1" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                            @if(count($items) > 0)
                              <option value="">Select Item</option>
                              @foreach($items as $i)
                                <option value="{{ encrypt($i->inventory_id) }}">{{ $i->item->item_name . ' - ' . $i->item->item_code . ' - sold per ' . $i->unit->code}}</option>
                              @endforeach
                            @else
                              <option value="">No Items Available</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="quantity1">Quantity</label>
                          <input type="number" name="quantity1" id="quantity1" class="form-control" placeholder="Quantity" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price1">Unit Price</label>
                          <input type="number" name="price1" id="price1" class="form-control" placeholder="Unit Price" required>
                        </div>
                      </div>
                    </div>
                    {{-- End of Item 1 --}}



                    {{-- Start of Item 2 --}}
                    {{-- <hr>
                    <h5>Item 2</h5>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="item2">Item</label>
                          <select name="item2" id="item2" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                            @if(count($items) > 0)
                              <option value="">Select Item</option>
                              @foreach($items as $i)
                                <option value="{{ encrypt($i->inventory_item) }}">{{ $i->item->item_name . ' - ' . $i->item->item_code . ' - sold per ' . $i->unit->code}}</option>
                              @endforeach
                            @else
                              <option value="">No Items Available</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="quantity2">Quantity</label>
                          <input type="number" name="quantity2" id="quantity2" class="form-control" placeholder="Quantity" >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price2">Unit Price</label>
                          <input type="number" name="price2" id="price2" class="form-control" placeholder="Unit Price" >
                        </div>
                      </div>
                    </div> --}}
                    {{-- End of Item 2 --}}


                    {{-- Start of Item 2 --}}
                    {{-- <hr>
                    <h5>Item 3</h5>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="item3">Item</label>
                          <select name="item3" id="item3" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                            @if(count($items) > 0)
                              <option value="">Select Item</option>
                              @foreach($items as $i)
                                <option value="{{ encrypt($i->inventory_item) }}">{{ $i->item->item_name . ' - ' . $i->item->item_code . ' - sold per ' . $i->unit->code}}</option>
                              @endforeach
                            @else
                              <option value="">No Items Available</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="quantity3">Quantity</label>
                          <input type="number" name="quantity3" id="quantity3" class="form-control" placeholder="Quantity" >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price3">Unit Price</label>
                          <input type="number" name="price3" id="price3" class="form-control" placeholder="Unit Price" >
                        </div>
                      </div>
                    </div> --}}
                    {{-- End of Item 3 --}}


                    {{-- Start of Item 4 --}}
                    {{-- <hr>
                    <h5>Item 4</h5>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="item4">Item</label>
                          <select name="item4" id="item4" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                            @if(count($items) > 0)
                              <option value="">Select Item</option>
                              @foreach($items as $i)
                                <option value="{{ encrypt($i->inventory_item) }}">{{ $i->item->item_name . ' - ' . $i->item->item_code . ' - sold per ' . $i->unit->code}}</option>
                              @endforeach
                            @else
                              <option value="">No Items Available</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="quantity4">Quantity</label>
                          <input type="number" name="quantity4" id="quantity4" class="form-control" placeholder="Quantity" >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price4">Unit Price</label>
                          <input type="number" name="price4" id="price4" class="form-control" placeholder="Unit Price" >
                        </div>
                      </div>
                    </div> --}}
                    {{-- End of Item 4 --}}


                    {{-- Start of Item 5 --}}
                    {{-- <hr>
                    <h5>Item 5</h5>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="item5">Item</label>
                          <select name="item5" id="item5" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" >
                            @if(count($items) > 0)
                              <option value="">Select Item</option>
                              @foreach($items as $i)
                                <option value="{{ encrypt($i->inventory_item) }}">{{ $i->item->item_name . ' - ' . $i->item->item_code . ' - sold per ' . $i->unit->code}}</option>
                              @endforeach
                            @else
                              <option value="">No Items Available</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="quantity5">Quantity</label>
                          <input type="number" name="quantity5" id="quantity5" class="form-control" placeholder="Quantity" >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="price5">Unit Price</label>
                          <input type="number" name="price5" id="price5" class="form-control" placeholder="Unit Price" >
                        </div>
                      </div>
                    </div> --}}
                    {{-- End of Item 5 --}}




                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Outgoing Item</button>
                      <a href="{{ route('inventories') }}" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
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

