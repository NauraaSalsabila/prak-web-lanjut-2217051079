<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <div class="image-wrapper">
        <img src="{{ asset('assets/img/cat.png') }}" alt="Cat Image">
    </div>
    <body style="background-image: url('{{ asset('assets/img/bg2.png') }}');">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">

        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm">

        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas">

        <button type="submit">Submit</button>
    </form>
</body>
</html>