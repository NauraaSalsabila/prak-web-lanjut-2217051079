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
                <th>Foto</th> 
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
                <td>
                    @if ($user['foto']) 
                        <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="Foto Profil" style="width: auto; height: 100px; object-fit: cover; border: 1px solid #ccc; border-radius: 5px;">
                    @else
                        <span>Tidak ada foto</span>
                    @endif
                </td>
                <td class="text-center">
                    <div style="display: flex; justify-content: center;"> 
                        <button type="button" class="btn action-btn view mx-1" onclick="window.location.href='{{ route('user.show', $user['id']) }}'">View</button>
                        <button type="button" class="btn action-btn edit mx-1" onclick="window.location.href='{{ route('user.edit', $user['id']) }}'">Edit</button>
                        <form action="{{ route('user.destroy', $user['id']) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn action-btn mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
@endsection
