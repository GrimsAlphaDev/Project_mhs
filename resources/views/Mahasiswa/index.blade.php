@extends('../layouts/mainapp')

@section('title', 'List Mahasiswa')
@section('pagetitle', 'Mahasiswa')

@section('container')

    {{-- jika message berhasil --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Jika message gagal --}}
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Show error from validation --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mb-3">List Mahasiswa</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
        Tambah Data Mahasiswa
    </button>

    <div class="table-responsive">
        <table class="table table-striped table-hover">

            <div class="position-relative mb-5">
                <div class="position-absolute top-0 end-0">{{ $mahasiswas->links() }} </div>
            </div>
            <thead>
                <th>No</th>
                <th>Nim</th>
                <th>Nama Mahasiswa</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>action</th>
            </thead>
            @php($no = 1)
            @foreach ($mahasiswas as $mhs)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td><a href="/mahasiswa/{{ $mhs->id }}">{{ $mhs->nama_mhs }}</a></td>
                    <td>{{ $mhs->umur }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>
                        {{-- inline div --}}
                        <div class="btn-group" role="group">
                            <a href="/mahasiswa/{{ $mhs->id }}/edit" class="btn btn-outline-warning btn-sm text-dark">Edit</a>
                            {{-- create small space between button --}}
                            &nbsp; | &nbsp;
                            <form action="/mahasiswa/{{ $mhs->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Yakin Menghapus Data {{ $mhs->nama_mhs }}')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php($no++)
            @endforeach
        </table>
    </div>


    {{-- @error('nama')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
@endsection
