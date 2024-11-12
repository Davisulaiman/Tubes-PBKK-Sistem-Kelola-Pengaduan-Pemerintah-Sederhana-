@extends('template.template')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>

        @if (Auth::user()->role == 'admin')
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Selamat Datang Admin</li>
            </ol>
            <div class="row">
                <!-- Kelola Pengaduan Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-clipboard-list me-2"></i>
                                Kelola Pengaduan
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Manajemen data pengaduan</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('laporan.kelolaPengaduan') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Data Laporan -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-paper-plane me-2"></i>
                                Data Laporan
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Manajemen data laporan</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ url('/laporan') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Data Pengguna Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-secondary text-white h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-user me-2"></i>
                                Data Pengguna
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Informasi detail pengguna</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ url('/pelapor') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
        @endif

        @if (Auth::user()->role == 'user')
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Selamat Datang User</li>
            </ol>
            <div class="row">
                <!-- Buat Laporan Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-edit me-2"></i>
                                Buat Laporan
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Ajukan pengaduan baru</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('laporan.create') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Pengaduan Saya Card -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card bg-success text-white h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list-alt me-2"></i>
                                Pengaduan Saya
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Lihat riwayat pengaduan</p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="text-white text-decoration-none" href="{{ route('laporan.daftarpengaduansaya') }}">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
