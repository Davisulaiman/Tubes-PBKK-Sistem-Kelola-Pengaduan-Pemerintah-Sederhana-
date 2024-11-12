@extends('template.template')

@section('content')
<div class="container mt-5">
    <h2>Daftar Pengaduan Saya</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Laporan</th>
                <th>Status</th>
                <th>Jenis Lainnya</th>
                <th>Keluhan</th>
                <th>Tanggal Laporan</th>
                <th>Bukti Pendukung</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td> <!-- Menambahkan kolom Nomor -->
                    <td>{{ $laporan->nama }}</td>
                    <td>{{ $laporan->email }}</td>
                    <td>{{ $laporan->jenis_laporan }}</td>
                    <td>{{ $laporan->status }}</td>
                    <td>{{ $laporan->jenis_lainnya }}</td>
                    <td>{{ $laporan->keluhan }}</td>
                    <td>{{ $laporan->tanggal_laporan }}</td>
                    <td>
                        @if($laporan->bukti_pendukung)
                            <a href="{{ asset($laporan->bukti_pendukung) }}" target="_blank">Lihat Bukti</a>
                        @else
                            Tidak ada bukti
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
