<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>  Shipping Permit No: {{ $permit->permit_no }} </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  
  <style>
    @page {
      size: legal landscape;
      margin: 1cm !important;
    }


    html, body {
      height: 100%;
    }

    table{
      width: 100%;
    }
    
    #printArea, #printArea * {
      visibility: visible;
    }
    #printArea {
      left: 0;
      top: 0 !important;
      position:fixed;
      width: 100%;
      height: 100%;
      bottom: 0;
      float: none;
    }

    .pull-left {
      left: 0;
    }

    .pull-right {
      right: 0;
    }

    .page-break {
      page-break-after: always;
    }

    .underline {
      border-bottom: 1px solid black;
    }

    td {
      height: 30px;
    }
  </style>



</head>
<body>
  <div class="wrapper">
    <div class="content-wrapper">

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
              {{-- <p class="text-center"><img class="img" height="125px" src="{{ asset('/images/bai.png') }}" alt="Bureau of Animal Industries"></p> --}}
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
              {{-- <p class="text-center"><img class="img" height="125px" src="http://localhost:8000/images/dar.png" alt="Tarlac Provincial Government"></p> --}}
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
            <div class="col-md-2">
              Date and Time
            </div>
            <div class="col-md-3 underline">
              <strong>-</strong>
            </div>
            <div class="col-md-2">
              Valid Until
            </div>
            <div class="col-md-3 underline">
              <strong>{{ date('F j, Y', strtotime($permit->valid_until)) }}</strong>
              {!! \App\Http\Controllers\GeneralController::validUntil($permit->valid_until) !!}
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-2">
              Shipper's Name
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->shippers_name }}</strong>
           </div>
           <div class="col-md-2">
              Livestock Handler's No.
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->livestock_handlers_no }}</strong>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-2">
              Shipper's Address
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->shippers_address }}</strong>
            </div>
            <div class="col-md-2">
              Shipper's Contact No.
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->shippers_contact_no }}</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              Origin
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->originFarm->name }}</strong>
            </div>
            <div class="col-md-2">
              Livestock Carrier
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->livestock_carrier }}</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-3">
              <p class="text-center">Farm/Address</p>
            </div>
            <div class="col-md-2">
              Vehicle Type
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->vehicle_type }}</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              Destination
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->destination }}</strong>
            </div>
            <div class="col-md-2">
              Plate No.
            </div>
            <div class="col-md-3 underline">
              <strong>{{ $permit->plate_no }}</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              
            </div>
            <div class="col-md-3">
              <p class="text-center">Farm/Address</p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3"></div>
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
              <div class="col-md-3"></div>
              <div class="col-md-4 underline">
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p class="text-center"><strong>{{ strtoupper($permit->inspected_by) }}</strong></p>
              <p class="text-center">{{ $permit->inspectors_address }}</p>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4">
              <p class="text-center"><strong>{{ strtoupper($permit->approved_by) }}</strong></p>
              <p class="text-center">{{ $permit->approvers_address }}</p>
            </div>
          </div>
        </div>       
        {{-- <div class="page-break"></div> --}}
      </div>
      <!-- /.row -->
    </section>
      <!-- /.content -->
    </div>
  </div>

</body>
</html>
