<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
    <link rel="icon" href="{{ URL::asset('img/logo_hedo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col text-center">
            <br><h2>DATA USER <br> PT. HEDO GLOBAL TECHNOLOGY</h2>
            <img src="{{ URL::asset('img/logo_hedo.png') }}" alt="logo" width="15%"><br><br>
            <table border="1" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Peran</th>
                    <th scope="col">Dibuat pada tanggal</th>
                    <th scope="col">Terakhir login</th>
                    <th scope="col">Alamat IP</th>
                  </tr>
                </thead>
                @php $i=1 @endphp
                @foreach($datauser as $u)
                <tbody>
                  <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->role }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>{{ $u->last_login_at }}</td>
                    <td>{{ $u->last_login_ip }}</td>
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