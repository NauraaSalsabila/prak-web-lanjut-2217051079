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

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" value="{{ old('npm', $user->npm ?? '') }}">
            @foreach($errors->get('npm') as $msg)
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

            <div class="form-group">
            <label for="foto" style="margin-top: 20px;">Foto</label>                <input type="file" name="foto" class="form-control">
                @if($user->foto)
                    <img src="{{ asset($user->foto) }}" alt="User Photo" width="100" class="mt-2">
                @endif
            </div><br>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
