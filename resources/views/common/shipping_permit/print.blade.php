@extends('layouts.print')

@section('title') Shipping Permit No: {{ $permit->permit_no }} @endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- <h1>
        Shipping Permit
      </h1> --}}
      <ol class="breadcrumb">
        <li><a href="{{ route('landing.page') }}"><i class="fa fa-truck"></i> Home</a></li>
        <li class="active"><a href="{{ route('shipping.permits') }}">Shipping Permit</a></li>
        <li><a href="javascript:void(0)" onClick="window.print()"><i class="fa fa-print"></i></a></li>
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

      <div id="printArea">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12"><p id="page-footer"><br></p></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              {{-- <p class="text-center"><img class="img" height="125px" src="{{ asset('/images/bai_orig.png') }}" alt="Bureau of Animal Industries"></p> --}}
            </div>
            <div class="col-md-4">
              <p class="text-center">
                Republic of the Philippines<br>
                Department of Agriculture<br>
                Bureau of Animal Industry<br>
                Visayas Avenue, Quezon City<br>
                <strong>VETERINARY SHIPPING PERMIT</strong>
              </p>
            </div>
            <div class="col-md-4">
              {{-- <p class="text-center"><img class="img" height="125px" src="{{ asset('/images/dar_orig.png') }}" alt="Tarlac Provincial Government"></p> --}}
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <p class="pull-right">Permit No: <strong>{{ $permit->permit_no }}</strong></p>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-5">
                  Date and Time
                </div>
                <div class="col-md-7 underline">
                  <strong>-</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Shipper's Name
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->shippers_name }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Shipper's Address
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->shippers_address }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Origin
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->originFarm->name }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  
                </div>
                <div class="col-md-7">
                  <p class="text-center">Farm/Address</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Destination
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->destination }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  
                </div>
                <div class="col-md-7">
                  <p class="text-center">Farm/Address</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-5">
                  Valid Until
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ date('F j, Y', strtotime($permit->valid_until)) }}</strong>
                  {!! \App\Http\Controllers\GeneralController::validUntil($permit->valid_until) !!}
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Livestock Handler's No.
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->livestock_handlers_no }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Shipper's Contact No.
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->shippers_contact_no }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Livestock Carrier
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->livestock_carrier }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Vehicle Type
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->vehicle_type }}</strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  Plate No.
                </div>
                <div class="col-md-7 underline">
                  <strong>{{ $permit->plate_no }}</strong>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="animals" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Animals/Products/By-Products</th>
                      <th>Classification (Breeder, Slaughter, ect.)</th>
                      <th>Sex</th>
                      <th>Quantity (No. of Heads / Kilos)</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              Inspected By:
            </div>
            <div class="col-md-6">
              Approved By:
            </div>
          </div>
          <br><br>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 underline">
                
              </div>
              <div class="col-md-4"></div>
              <div class="col-md-4 underline">
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p class="text-center"><strong>{{ strtoupper($permit->inspected_by) }}</strong></p>
              <p class="text-center">{{ $permit->inspectors_address }}</p>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <p class="text-center"><strong>{{ strtoupper($permit->approved_by) }}</strong></p>
              <p class="text-center">{{ $permit->approvers_address }}</p>
            </div>
          </div>
        </div>       
        
        {{-- <div class="container-fluid">
          <div class="row">
            <div class="col-md-12"><p id="page-footer">Tarlac Provincial Veterinary Office</p></div>
          </div>
        </div> --}}
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

