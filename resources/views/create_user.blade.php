@extends('layouts.app')

@section('content')
    <div class="image-wrapper {{ $errors->any() ? 'has-error' : '' }}">
        <img src="{{ asset('assets/img/cat.png') }}" alt="Cat Image">
    </div>

    <body style="background-image: url('{{ asset('assets/img/bg2.png') }}');">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
            @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" id="kelas_id" required>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
            @foreach($errors->get('kelas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="semester">Semester:</label>
            <input type="number" id="semester" name="semester" value="{{ old('semester') }}" max="14" min="1">
            @foreach($errors->get('semester') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" id="jurusan" required>
                <option value="fisika" {{ old('jurusan') == 'fisika' ? 'selected' : '' }}>Fisika</option>
                <option value="kimia" {{ old('jurusan') == 'kimia' ? 'selected' : '' }}>Kimia</option>
                <option value="biologi" {{ old('jurusan') == 'biologi' ? 'selected' : '' }}>Biologi</option>
                <option value="matematika" {{ old('jurusan') == 'matematika' ? 'selected' : '' }}>Matematika</option>
                <option value="ilmu komputer" {{ old('jurusan') == 'ilmu komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
            </select>
            @foreach($errors->get('jurusan') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" id="fakultas_id" required>
                @foreach($fakultas as $fakultasItem)
                    <option value="{{ $fakultasItem->id }}" {{ old('fakultas_id') == $fakultasItem->id ? 'selected' : '' }}>
                        {{ $fakultasItem->nama_fakultas }}
                    </option>
                @endforeach
            </select>
            @foreach($errors->get('fakultas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <label class="margin-top">Foto:</label>
            <input type="file" id="foto" name="foto">
            @foreach($errors->get('foto') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
