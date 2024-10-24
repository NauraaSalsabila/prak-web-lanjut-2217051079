@extends('layouts.app')

@section('content')

    <body style="background-image: url('{{ asset('assets/img/bg2.png') }}');">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama ?? '') }}">
            @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ (old('kelas_id', $user->kelas_id ?? '') == $kelasItem->id) ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @foreach($errors->get('kelas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="semester">Semester:</label>
            <input type="number" id="semester" name="semester" value="{{ old('semester', $user->semester ?? '') }}" min="1" max="14">
            @foreach($errors->get('semester') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" id="jurusan" required>
                <option value="fisika" {{ (old('jurusan', $user->jurusan ?? '') == 'fisika') ? 'selected' : '' }}>Fisika</option>
                <option value="kimia" {{ (old('jurusan', $user->jurusan ?? '') == 'kimia') ? 'selected' : '' }}>Kimia</option>
                <option value="biologi" {{ (old('jurusan', $user->jurusan ?? '') == 'biologi') ? 'selected' : '' }}>Biologi</option>
                <option value="matematika" {{ (old('jurusan', $user->jurusan ?? '') == 'matematika') ? 'selected' : '' }}>Matematika</option>
                <option value="ilmu komputer" {{ (old('jurusan', $user->jurusan ?? '') == 'ilmu komputer') ? 'selected' : '' }}>Ilmu Komputer</option>
            </select>
            @foreach($errors->get('jurusan') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" id="fakultas_id" required>
                @foreach ($fakultas as $f)
                    <option value="{{ $f->id }}" {{ (old('fakultas_id', $user->fakultas_id ?? '') == $f->id) ? 'selected' : '' }}>
                        {{ $f->nama_fakultas }}
                    </option>
                @endforeach
            </select>
            @foreach($errors->get('fakultas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <div class="form-group">
                <label for="foto" style="margin-top: 20px;">Foto</label>                
                <input type="file" name="foto" class="form-control">
                @if($user->foto)
                    <img src="{{ asset('storage/uploads/' . $user->foto) }}" alt="User Photo" width="100" class="mt-2">
                @endif
            </div><br>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
