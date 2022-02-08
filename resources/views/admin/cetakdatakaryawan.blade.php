<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karyawan</title>
    <link rel="icon" href="{{ URL::asset('img/logo_hedo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col text-center">
            <br><h2>DATA KARYAWAN <br> PT. HEDO GLOBAL TECHNOLOGY</h2>
            <img src="{{ URL::asset('img/logo_hedo.png') }}" alt="logo" width="15%"><br><br>
            <table border="1" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Departemen</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Gaji</th>
                  </tr>
                </thead>
                @php $i=1 @endphp
                @foreach($datakaryawan as $a)
                <tbody>
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->tanggal_lahir }}</td>
                    <td>{{ $a->jenis_kelamin }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->no_hp }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->departemen }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>{{ $a->gaji }}</td>
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