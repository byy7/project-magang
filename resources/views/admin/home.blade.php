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
                        {{ csrf_field() }}
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
        <li class="active"><a href="{{ url('home') }}"><i class="fa fa-desktop"></i> <span>Data Karyawan</span></a></li>
        <li class="active"><a href="{{ url('admin/datauser') }}"><i class="fa fa-users"></i> <span>Data User</span></a></li>
        <li class="active"><a href="{{ url('admin/datasertifikat') }}"><i class="fa fa-folder-o"></i> <span>Data Sertifikat</span></a></li>
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
                  <a href="{{ url('admin/inputfile') }}"
                      ><i class="fa fa-circle-o"></i>
                      Sertifikat</a
                  >
              </li>
            </ul>
            <li class="header">Laporan</li>
            <li class="active"><a href="{{ url('admin/laporan') }}"><i class="glyphicon glyphicon-book"></i> <span>Laporan Absensi Karyawan</span></a></li>
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
    <section class="content-header text-center">
      <h1 class="text-center">
        <strong>DATA KARYAWAN<br>PT. HEDO GLOBAL TECHNOLOGY</strong><br>
      </h1>
      <img src="{{ URL::asset('img/logo_hedo.png') }}" alt="logo" width="15%">
    </section><br>

    <!-- Main content -->
    <section class="content mr-auto">
	    <form action="{{ url('admin/caridata') }}" method="GET">
		  <input type="text" name="cari" placeholder="Cari Data ..." value="{{ old('cari') }}">
		  <input type="submit" value="CARI">
      </form>
	    <br>
      <div class="table-responsive">
        <table border="1" class="table table-dark table-hover bg-info text-center">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Email</th>
              <th scope="col">No HP</th>
              <th scope="col">Alamat</th>
              <th scope="col">Departemen</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Gaji</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          @foreach($admin as $a)
          <tbody>
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $a->nama }}</td>
              <td>{{ $a->tanggal_lahir }}</td>
              <td>{{ $a->jenis_kelamin }}</td>
              <td>{{ $a->email }}</td>
              <td>{{ $a->no_hp }}</td>
              <td>{{ $a->alamat	 }}</td>
              <td>{{ $a->departemen	}}</td>
              <td>{{ $a->jabatan }}</td>
              <td>{{ $a->gaji }}</td>
              <td align="center">
              
                <a class="glyphicon glyphicon-edit" style="color: #ff8800e3" href="/admin/edit/{{ $a->id }}"<abbr title="Edit data"></abbr></a>&emsp;
                <a class="glyphicon glyphicon-trash" style="color: #ff0000e1" onclick="return  confirm('Yakin ingin menghapus data?')" href="/admin/hapus/{{ $a->id }}"<abbr title="Hapus data"></abbr></a>&emsp;
                <a class="glyphicon glyphicon-print" target="_blank" style="color: #006eff" href="{{ url('admin/cetakdatakaryawan') }}"<abbr title="Cetak data"></abbr></a>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <br>
      Halaman : {{ $admin->currentPage() }} <br>
      Jumlah Data : {{ $admin->total() }} <br>

      {{ $admin->links() }}
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