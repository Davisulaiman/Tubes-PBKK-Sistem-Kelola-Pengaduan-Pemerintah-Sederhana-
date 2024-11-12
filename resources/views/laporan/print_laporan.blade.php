<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
        }
        .card {
            border: none;
            box-shadow: none;
        }
        .card-header {
            background-color: #f8f9fa !important;
            color: #000 !important;
        }
        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center mb-0">Detail Laporan</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nama</h5>
                        <p class="card-text">{{ $data->nama }}</p>

                        <h5 class="card-title">Jenis Laporan</h5>
                        <p class="card-text">{{ $data->jenis_laporan }}</p>

                        @if($data->jenis_laporan === 'Lainnya')
                            <h5 class="card-title">Jenis Lainnya</h5>
                            <p class="card-text">{{ $data->jenis_lainnya ?? 'Tidak ada keterangan' }}</p>
                        @endif

                        <h5 class="card-title">Tanggal Laporan</h5>
                        <p class="card-text">{{ $data->tanggal_laporan }}</p>

                        <h5 class="card-title">File</h5>
                        @if ($data->bukti_pendukung)
                            @php
                                $fileExtension = pathinfo($data->bukti_pendukung, PATHINFO_EXTENSION);
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                $fileName = basename($data->bukti_pendukung);
                            @endphp
                            @if (in_array(strtolower($fileExtension), $imageExtensions))
                                <img src="{{ asset($data->bukti_pendukung) }}" alt="Bukti Pendukung" style="max-width: 100%; height: auto;">
                            @elseif (strtolower($fileExtension) === 'pdf')
                                <p>{{ $fileName }}</p>
                                <a href="{{ asset($data->bukti_pendukung) }}" target="_blank">Lihat Bukti PDF</a>
                            @else
                                <a href="{{ asset($data->bukti_pendukung) }}" target="_blank">Lihat Bukti</a>
                            @endif
                        @else
                            Tidak ada bukti
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
