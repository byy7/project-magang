<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
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

</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</span>
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
        {{-- <li class="active"><a href="{{ url('home') }}"><i class="glyphicon glyphicon-book"></i> <span>Data Absensi Karyawan</span></a></li>
        <li class="header">INPUT DATA</li>
        <li class="active treeview">
            <a href="#">
                <i class="fa fa-plus-square-o"></i>
                <span>Input</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="">
                    <a href="{{ url('admin/inputdata') }}"
                        ><i class="fa fa-circle-o"></i>
                        Data Karyawan</a
                    >
                </li>
                <li class="">
                  <a href="{{ url('admin/inputsertif') }}"
                      ><i class="fa fa-circle-o"></i>
                      Sertifikat Kerja</a
                  >
              </li>
              <li class="">
                <a href="{{ url('admin/inputlaporan') }}"
                    ><i class="fa fa-circle-o"></i>
                    Laporan Kehadiran</a
                >
            </li> --}}
            </ul>
        </li>
        {{-- <li><a href="{{ url('admin/input') }}"><i class="fa fa-plus-square-o"></i> <span>Input Data</span></a></li> --}}
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
        <strong>EDIT DATA KARYAWAN<br>PT. HEDO GLOBAL TECHNOLOGY</strong><br><br>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container">
        @foreach($edit as $e)
        <form action="{{ url('admin/updatedata') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$e->id}}">
        <div class="form-row">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required="required" value="{{ $e->nama }}">
          </div> <br>
          <div class="m-5">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required="required" value="{{ $e->tanggal_lahir }}">
          </div> <br>
          <div class="m-5">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" required="required">
                <option selected >{{ $e->jenis_kelamin }}</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
          </div> <br>
          <div class="m-5">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required="required" value="{{ $e->email }}">
          </div> <br>
          <div class="m-5">
            <label class="form-label">No.HP</label>
            <input type="number" name="no_hp" class="form-control" required="required" value="{{ $e->no_hp }}">
          </div> <br>
          <div class="m-5">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" rows="3" name="alamat" required="required">{{ $e->alamat }}</textarea>
          </div> <br>
          <div class="m-5">
            <label class="form-label">Departemen</label>
            <select class="form-control" name="departemen" required="required">
                <option selected>{{ $e->departemen }}</option>
                <option value="IT">IT</option>
                <option value="Creative Media">Creative Media</option>
                <option value="Digital Marketing">Digital Marketing</option>
                <option value="Digital Production">Digital Production</option>
                <option value="Human Resource Development (HRD)">Human Resource Development (HRD)</option>
              </select>
          </div> <br>
          <div class="m-5">
            <label class="form-label">Jabatan</label>
            <select class="form-control" name="jabatan" required="required">
                <option selected>{{ $e->jabatan }}</option>
                <option value="Staff">Staff</option>
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
              </select>
          </div> <br>
          <div class="m-5">
            <label class="form-label">Gaji</label>
            <select class="form-control" name="gaji" required="required">
                <option selected>{{ $e->gaji }}</option>
                <option value="Rp.5.500.000">Rp.5.500.000</option>
                <option value="Rp.6.000.000">Rp.6.000.000</option>
                <option value="Rp.6.500.000">Rp.6.500.000</option>
                <option value="Rp.4.000.000">Rp.4.000.000</option>
                <option value="Rp.4.300.000">Rp.4.300.000</option>
                <option value="Rp.4.700.000">Rp.4.700.000</option>
                <option value="Rp.4.200.000">Rp.4.200.000</option>
                <option value="Rp.4.500.000">Rp.4.500.000</option>
                <option value="Rp.4.800.000">Rp.4.800.000</option>
                <option value="Rp.4.800.000">Rp.4.800.000</option>
                <option value="Rp.5.000.000">Rp.5.000.000</option>
                <option value="Rp.5.500.000">Rp.5.500.000</option>
                <option value="Rp.5.800.000">Rp.5.800.000</option>
                <option value="Rp.6.000.000">Rp.6.000.000</option>
                <option value="Rp.6.300.000">Rp.6.300.000</option>
              </select>
          </div> <br>
          <center>
            <a class="btn btn-warning" href="{{ url('home') }}">Batal</a>
            <input type="submit" class="btn btn-success" value="Submit">
          </center>
        </form>
        @endforeach
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