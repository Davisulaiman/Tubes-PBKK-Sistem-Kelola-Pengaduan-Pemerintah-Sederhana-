@extends('template.template')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow" id="print-area">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center mb-0">Detail Laporan</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nama</h5>
                        <p class="card-text">{{ $data->nama }}</p>

                        <h5 class="card-title">Jenis Laporan</h5>
                        <p class="card-text">{{ $data->jenis_laporan }}</p>

                        @if ($data->jenis_laporan === 'Lainnya')
                            <h5 class="card-title">Jenis Lainnya</h5>
                            <p class="card-text">{{ $data->jenis_lainnya ?? 'Tidak ada keterangan' }}</p>
                        @endif

                        <h5 class="card-title">Tanggal Laporan</h5>
                        <p class="card-text">{{ $data->tanggal_laporan }}</p>

                        <h5 class="card-title">File</h5>
                        @if ($data->bukti_pendukung)
                            <a href="{{ asset($data->bukti_pendukung) }}" target="_blank">Lihat Bukti</a>
                        @else
                            Tidak ada bukti
                        @endif
                    </div>
                </div>
                <a href="{{ route('laporan.print', $data->id) }}" target="_blank" class="btn btn-secondary mt-3">Cetak
                    Laporan</a>
            </div>
        </div>
    </div>
@endsection
