<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title') :: Online Inventory</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}"> --}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  @yield('style')

  <!-- jQuery 3 -->
  <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
  <!-- FastClick -->
  {{-- <script src="{{ asset('dist/js/fastclick.js') }}"></script> --}}
  <!-- Sparkline -->
  {{-- <script src="{{ asset('dist/js/jquery.sparkline.min.js') }}"></script> --}}
  <!-- jvectormap  -->
  {{-- <script src="{{ asset('jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
  <!-- SlimScroll -->
  {{-- <script src="{{ asset('dist/js/jquery.slimscroll.min.js') }}"></script> --}}
  <!-- ChartJS -->
  {{-- <script src="{{ asset('dist/chart.js/Chart.js') }}"></script> --}}



  
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  @include('includes.header')
  @include('includes.sidebar')

  @yield('content')

  @include('includes.footer')



</div>
<!-- ./wrapper -->

@yield('script')

</body>
</html>
