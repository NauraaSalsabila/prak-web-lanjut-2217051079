<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7x8l5fvIYkZt20p5pcvd6sH9/EnNB3F5JfY" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 
</head>
<body style="background-image: url('{{ asset('assets/img/bg1.png') }}');">
    <div class="container d-flex justify-content-center">
        <div class="profile-container">
        <div class="d-flex justify-content-center">
        <img src="{{ asset($user->foto) }}" alt="Gambar Profil" style="width: 150px; height: 150px;">
</div>

            <h2 class="card-title">Profil</h2>
            <table class="table table-borderless mt-4 text-center">
                <tr>
                    <td>Nama</td>
                    <td>{{ $nama }}</td> 
                </tr>
                <tr>
                    <td>NPM</td>
                    <td>{{ $npm }}</td> 
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>{{ $user->kelas ? $user->kelas->nama_kelas : 'Kelas tidak ditemukan' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ksmxf+DG5w5bK+hTcIUA9K60YPj5m3hf8yL15kcA8rM9k/C7Pf5H3oOU73vJ4Gcs" crossorigin="anonymous"></script>
</body>
</html>