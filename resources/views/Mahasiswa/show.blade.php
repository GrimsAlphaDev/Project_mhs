@extends('../layouts/mainapp')

@section('title', 'Mahasiswa')
@section('pagetitle', 'Detail Mahasiswa')

@section('container')
<a href="/mahasiswa" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>

        <!-- Row -->
        <div class="row gx-5">
            <!-- Column -->
            <div class="col">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="{{ $mahasiswa->nama_mhs }}"
                            src="https://source.unsplash.com/600x400?programming">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="https://source.unsplash.com/400x400?face"
                                        class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white mt-2">{{ $mahasiswa->nama_mhs }}</h4>
                                <h5 class="text-white mt-2">{{ $mahasiswa->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Detail Mahasiswa</h2>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nama : {{ $mahasiswa->nama_mhs }}</li>
                            <li class="list-group-item">Nim : {{ $mahasiswa->nim }}</li>
                            <li class="list-group-item">email : {{ $mahasiswa->email }}</li>
                            <li class="list-group-item">umur : {{ $mahasiswa->umur }}</li>
                            <li class="list-group-item">Alamat : {{ $mahasiswa->alamat }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

@endsection
