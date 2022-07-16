@extends('../layouts/mainapp')

@section('title', 'Mahasiswa')
@section('pagetitle', 'Edit Data Mahasiswa ' . $mahasiswa->nama_mhs)

@section('container')

    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="post">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama_mhs"
                value="@if (old('nama_mhs')) {{ old('nama_mhs') }} 
    @else {{ $mahasiswa->nama_mhs }} @endif
    ">
            @error('nama_mhs')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Mahasiswa</label>
            <input type="email" class="form-control" id="email" name="email"
                value="
    @if (old('email')) {{ old('email') }} 
    @else
        {{ $mahasiswa->email }} @endif
    ">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="umur" class="form-label">Umur Mahasiswa</label>
            <input type="number" class="form-control" id="umur" name="umur"
                value=@if (old('umur')) {{ old('umur') }}
            @else
                {{ $mahasiswa->umur }} @endif>
            @error('umur')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Mahasiswa</label>
            <textarea class="form-control" id="alamat" name="alamat">
@if (old('alamat'))
{{ old('alamat') }}@else{{ $mahasiswa->alamat }}
@endif
</textarea>
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
