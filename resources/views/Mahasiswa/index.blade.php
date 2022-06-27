@extends('../layouts/mainapp')

@section('title', 'List Mahasiswa')
@section('pagetitle', 'Mahasiswa')

@section('container')
    <h1 class="mb-3">List Mahasiswa</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <td>{{ $mhs->nama_mhs }}</td>
                    <td>{{ $mhs->umur }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>
                        <a href="">
                            <i class="bi bi-trash"></i>
                        </a>
                        |
                        <a href="">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                @php($no++)
            @endforeach
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/mahasiswa" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                          </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur Mahasiswa</label>
                            <input type="number" class="form-control" id="umur" name="umur">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
