<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Activity</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  {{-- <div class="login-logo">
    <a href="javascript:void(0)">{{ strtoupper($event->title) }}</a>
  </div> --}}
  <!-- /.login-logo -->
  <div class="login-box-body" width=device-width>
    <div class="login-logo">
      <a href="javascript:void(0)">{{ $activity->image }}</a>
      <img src="{{ asset('/uploads/img/'. $activity->image) }}" alt="{{ $activity->image }}">
    </div>

    <p>
      <a href="javascript:void(0)" onclick="window.close()">Close</a>
      {{-- <a href="{{ route('previous.activities') }}">Activities</a> --}}
      &nbsp;&nbsp;&nbsp;
      {{-- <a href="{{ route('landing.page') }}">Home</a> --}}
    </p>
  </div>
</div>
<script src="{{ asset('dist/js/jquery.min.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
