<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User</title>
  <link rel="icon" href="{{ URL::asset('img/logo_hedo.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('adminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminLTE/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ url('adminLTE/dist/css/skins/skin-blue.min.css') }}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
 

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="{{ asset('js/jam.js') }}"></script>
    <style>
        #watch{
        color: rgb(252, 150, 65);
        position: absolute;
        z-index: 1;
        height: 40px;
        width: 700px;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        font-size: 10vw;
        -webkit-text-stroke: 3px rgb(210,65,36);
        text-shadow: 4px 4px 10px rgba(210,65,36,0.4),
        4px 4px 20px rgba(210,45,26,0.4),
        4px 4px 30px rgba(210,25,16,0.4),
        4px 4px 40px rgba(210,15,06,0.4);
    }
    </style>

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini" onload="realtimeClock()">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ Auth::user()->name }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top bg-secondary" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <center>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </center>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DATA</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ url('home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        <strong>ABSENSI KEHADIRAN (MASUK) <br> PT. HEDO GLOBAL TECHNOLOGY</strong><br>
        <img src="{{ URL::asset('img/logo_hedo.png') }}" alt="logo" width="15%">
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container">
        <div class="row justify-content-center">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <form action="{{ url('user/simpanabsenmasuk') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <center>
                                <label id="clock" style="font-size: 100px; color: #0A77DE; -webkit-text-stroke: 3px #00ACFE; text-shadow: 4px 4px 10px #36D6FE,4px 4px 20px #36D6FE,4px 4px 30px #36D6FE,4px 4px 40px #36D6FE;">
                                </label>
                            </center>
                        </div>
                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Klik untuk absen</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        {{-- <img src="{{ URL::asset('assets/img/ig.png') }}" alt="Instagram">
      <a href="https://www.instagram.com/kantahkabbanyuasin/" target="_blank">kantahkabbanyuasin</a> --}}
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 PT. Hedo GLobal Technology</strong>
  </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ url('adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('adminLTE/dist/js/adminlte.min.js') }}"></script>

@include('sweetalert::alert')

{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> --}}

{{-- <script>
  $(document).ready( function () {
    $('#data').DataTable();
} );
</script> --}}
</body>
</html>