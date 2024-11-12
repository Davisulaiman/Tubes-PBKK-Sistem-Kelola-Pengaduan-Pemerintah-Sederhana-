@extends('template.template')

@section('content')
    <!-- Form Laporan Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <!-- Card Header -->
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Laporan Pengaduan</h2>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Daftar Laporan -->
                        @if(Auth::user()->role == 'admin')
                            <div class="mt-4">
                                <h3>Daftar Laporan Pengaduan</h3>
                                @foreach ($laporans as $laporan)
                                    <div class="card my-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $laporan->nama }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $laporan->user->name }}</h6>
                                            <p class="card-text">{{ Str::limit($laporan->keluhan, 100) }}</p>
                                            <p>Status: <strong>{{ $laporan->status }}</strong></p>

                                            <!-- Form for Updating Status -->
                                            <form action="{{ route('laporan.updateStatus', $laporan->id) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="status">Perbarui Status</label>
                                                    <select name="status" id="status" class="form-control mb-3">
                                                        <option value="Menunggu" {{ $laporan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                        <option value="Sedang Diproses" {{ $laporan->status == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                                                        <option value="Selesai" {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                        <option value="Tutup" {{ $laporan->status == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary btn-sm w-100">Perbarui Status</button>
                                                </div>
                                            </form>

                                            <div class="d-flex justify-content-between mt-3">
                                                <a href="{{ route('obrolan.index', ['laporanId' => $laporan->id]) }}" class="btn btn-info btn-sm">Buka Obrolan</a>
                                                <a href="{{ route('laporan.lihat', ['id' => $laporan->id]) }}" class="btn btn-info btn-sm">Lihat Laporan</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-danger">Akses ditolak. Anda tidak memiliki izin untuk melihat laporan ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
