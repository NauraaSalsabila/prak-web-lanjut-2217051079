<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profile</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7x8l5fvIYkZt20p5pcvd6sH9/EnNB3F5JfY" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-container {
            background-color: white;
            padding: 40px; /* Perbesar padding */
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            max-width: 700px; /* Perbesar lebar maksimum */
            width: 100%;
            text-align: center;
        }
        .profile-container:hover {
            transform: scale(1.05);
        }
        .profile-container img {
            width: 150px; /* Perbesar gambar profil */
            height: 150px;
            border-radius: 50%;
            margin-bottom: 30px;
            border: 5px solid #74ebd5;
        }
        .profile-container .card-title {
            font-weight: bold;
            color: #555;
            font-size: 2rem; /* Perbesar ukuran font judul */
        }
        .profile-container table {
            width: 100%;
        }
        .profile-container td {
            padding: 15px; /* Perbesar padding dalam tabel */
            background-color: #f7f7f7;
            border-radius: 10px;
            margin: 10px 0;
            font-weight: bold;
            color: #555;
            font-size: 1.2rem; /* Perbesar ukuran font tabel */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="profile-container">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/foto_profil.jpeg') }}" alt="Gambar Profil">
            </div>
            <h2 class="card-title">Profile Information</h2>
            <table class="table table-borderless mt-4 text-center">
                <tr>
                    <td>Nama</td>
                    <td><?= $nama ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?= $kelas ?></td>
                </tr>
                <tr>
                    <td>NPM</td>
                    <td><?= $npm ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ksmxf+DG5w5bK+hTcIUA9K60YPj5m3hf8yL15kcA8rM9k/C7Pf5H3oOU73vJ4Gcs" crossorigin="anonymous"></script>
</body>
</html>
