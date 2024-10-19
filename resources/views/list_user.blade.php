@extends('layouts.app')

@section('content')
<body style="background-image: url('{{ asset('assets/img/bg3.png') }}');">

<div class="container">
    <h2 class="text-center">Daftar Pengguna</h2>
    
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3 custom-btn">Tambah Pengguna Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['nama'] }}</td>
                <td>{{ $user['npm'] }}</td>
                <td>{{ $user['nama_kelas'] }}</td>
                <td class="action-buttons">
                    <button class="btn btn-edit">Edit</button>
                    <button class="btn btn-delete">Hapus</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
@endsection