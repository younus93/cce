<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Bootstrap Admin Template</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="{{url('css/plugins/morris.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{url('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  {{--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>--}}
  {{--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>--}}
</head>

<body>

<div id="wrapper">
@include('layouts.navbar')
  <div id="page-wrapper">
  @yield('contents')
</div>

  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="{{url('js/jquery.js')}}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{url('js/bootstrap.min.js')}}"></script>
  <!-- Morris Charts JavaScript -->
  <script src="{{url('js/plugins/morris/raphael.min.js')}}"></script>
  <script src="{{url('js/plugins/morris/morris.min.js')}}"></script>
  <script src="{{url('js/plugins/morris/morris-data.js')}}"></script>
@yield('scripts')
</body>

</html>
