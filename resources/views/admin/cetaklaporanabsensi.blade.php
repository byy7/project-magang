<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Absensi</title>
    <link rel="icon" href="{{ URL::asset('img/logo_hedo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col text-center">
            <br><h2>LAPORAN ABSENSI KARYAWAN <br> PT. HEDO GLOBAL TECHNOLOGY</h2>
            <img src="{{ URL::asset('img/logo_hedo.png') }}" alt="logo" width="15%"><br><br>
            <table border="1" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Absensi Masuk</th>
                    <th scope="col">Absensi Keluar</th>
                    <th scope="col">Total Jam Kerja</th>
                    </tr>
                </thead>
                @php $i=1 @endphp
                @foreach($cetakdata as $u)
                <tbody>
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->user_id }}</td>
                    <td>{{ $u->tgl }}</td>
                    <td>{{ $u->jammasuk }}</td>
                    <td>{{ $u->jamkeluar }}</td>
                    <td>{{ $u->jamkerja }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <script type="text/javascript">
    window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>