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
                        <!-- Welcome Alert -->
                        <div class="alert alert-info">
                            <p class="mb-0">Selamat datang di Laporan Pengaduan. Silahkan isi Keluhan Kamu berdasarkan form di bawah ini.</p>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data"
                              class="needs-validation" novalidate id="laporanForm">
                            @csrf

                            <!-- Nama Field -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       value="{{ old('nama') }}" required autofocus>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Laporan Field -->
                            <div class="mb-3">
                                <label for="jenis_laporan" class="form-label">Jenis Laporanjhhjhjvjhv</label>
                                <select id="jenis_laporan" name="jenis_laporan"
                                        class="form-select @error('jenis_laporan') is-invalid @enderror" required>
                                    <option value="">-- Pilih Jenis Laporan --</option>
                                    <option value="Penyimpangan Wewenang">Penyimpangan Wewenang</option>
                                    <option value="Pelayanan Hubungan Masyarakat">Pelayanan Hubungan Masyarakat</option>
                                    <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                                    <option value="Hukum/Peradilan dan HAM">Hukum/Peradilan dan HAM</option>
                                    <option value="Maladministrasi dan Pelayanan Publik">Maladministrasi dan Pelayanan Publik</option>
                                    <option value="Audit dan Evaluasi">Audit dan Evaluasi</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                @error('jenis_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Lainnya Field -->
                            <div class="mb-3" id="jenis_lainnya_container" style="display: none;">
                                <label for="jenis_lainnya" class="form-label">Jenis Laporan (Lainnya)</label>
                                <input type="text" name="jenis_lainnya" id="jenis_lainnya"
                                       class="form-control @error('jenis_lainnya') is-invalid @enderror"
                                       value="{{ old('jenis_lainnya') }}">
                                @error('jenis_lainnya')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Keluhan Field -->
                            <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan</label>
                                <textarea name="keluhan" id="keluhan" rows="4"
                                          class="form-control @error('keluhan') is-invalid @enderror"
                                          required>{{ old('keluhan') }}</textarea>
                                @error('keluhan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Laporan Field -->
                            <div class="mb-3">
                                <label for="tanggal_laporan" class="form-label">Tanggal Laporan</label>
                                <input type="date" name="tanggal_laporan" id="tanggal_laporan"
                                       class="form-control @error('tanggal_laporan') is-invalid @enderror"
                                       value="{{ old('tanggal_laporan') }}" required>
                                @error('tanggal_laporan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Bukti Pendukung Field -->
                            <div class="mb-3">
                                <label for="bukti_pendukung" class="form-label">Bukti Pendukung (PDF/Gambar)</label>
                                <input type="file" name="bukti_pendukung" id="bukti_pendukung"
                                       class="form-control @error('bukti_pendukung') is-invalid @enderror"
                                       accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">*Opsional - Upload file berupa PDF atau gambar (Maks. 2MB)</small>
                                @error('bukti_pendukung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span class="button-text">Submit Laporan</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>

                        <!-- Obrolan Button for Each Laporan -->
                        <div class="mt-4">
                            <h3>Daftar Laporan Pengaduan</h3>
                            @foreach ($laporans as $laporan)
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $laporan->nama }}</h5>
                                        <h5 class="card-title">{{ $laporan->status }}</h5>
                                        <p class="card-text">{{ Str::limit($laporan->keluhan, 100) }}</p>
                                        <a href="{{ route('obrolan.index', ['laporanId' => $laporan->id]) }}" class="btn btn-info">Buka Obrolan</a>
                                        <a href="{{ route('laporan.lihat', ['id' => $laporan->id]) }}" class="btn btn-info">Lihat Laporan</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">
                        <i class="fas fa-check-circle me-2"></i>Laporan Berhasil
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h4>Terima Kasih!</h4>
                    <p class="mb-0">Laporan Anda telah berhasil dikirim.</p>
                    <p>Tim kami akan segera memproses laporan Anda.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ route('laporan.index') }}" class="btn btn-success px-4">
                        Kembali ke Halaman Utama
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize variables
            const form = document.getElementById('laporanForm');
            const submitBtn = document.getElementById('submitBtn');
            const jenisLaporanSelect = document.getElementById('jenis_laporan');
            const spinner = submitBtn.querySelector('.spinner-border');
            const buttonText = submitBtn.querySelector('.button-text');

            // Function to toggle loading state
            function toggleLoading(isLoading) {
                submitBtn.disabled = isLoading;
                if (isLoading) {
                    spinner.classList.remove('d-none');
                    buttonText.textContent = 'Mengirim...';
                } else {
                    spinner.classList.add('d-none');
                    buttonText.textContent = 'Submit Laporan';
                }
            }

            // Function to toggle Jenis Lainnya field
            function toggleJenisLainnya() {
                const jenisLainnyaContainer = document.getElementById('jenis_lainnya_container');
                if (jenisLaporanSelect.value === 'Lainnya') {
                    jenisLainnyaContainer.style.display = 'block';
                } else {
                    jenisLainnyaContainer.style.display = 'none';
                }
            }

            // Toggle Jenis Lainnya on page load and on change of jenis_laporan
            toggleJenisLainnya();
            jenisLaporanSelect.addEventListener('change', toggleJenisLainnya);

            // // Form submit event
            // form.addEventListener('submit', function(e) {
            //     e.preventDefault();
            //     toggleLoading(true);

            //     // Simulate form submission delay
            //     setTimeout(function() {
            //         // Normally, you'd submit the form here
            //         toggleLoading(false);
            //         new bootstrap.Modal(document.getElementById('successModal')).show();
            //     }, 2000);
            // });
        });
    </script>
@endpush

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize variables
        const form = document.getElementById('laporanForm');
        const submitBtn = document.getElementById('submitBtn');
        const jenisLaporanSelect = document.getElementById('jenis_laporan');
        const spinner = submitBtn.querySelector('.spinner-border');
        const buttonText = submitBtn.querySelector('.button-text');

        // Function to toggle loading state
        function toggleLoading(isLoading) {
            submitBtn.disabled = isLoading;
            if (isLoading) {
                spinner.classList.remove('d-none');
                buttonText.textContent = 'Mengirim...';
            } else {
                spinner.classList.add('d-none');
                buttonText.textContent = 'Submit Laporan';
            }
        }

        // Function to toggle Jenis Lainnya field
        function toggleJenisLainnya() {
            const jenisLainnyaContainer = document.getElementById('jenis_lainnya_container');
            if (jenisLaporanSelect.value === 'Lainnya') {
                jenisLainnyaContainer.style.display = 'block';
            } else {
                jenisLainnyaContainer.style.display = 'none';
            }
        }

        // Toggle Jenis Lainnya on page load and on change of jenis_laporan
        toggleJenisLainnya();
        jenisLaporanSelect.addEventListener('change', toggleJenisLainnya);

        // Form submit event
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            toggleLoading(true);

            // Simulate form submission delay
            setTimeout(function() {
                // Normally, you'd submit the form here
                toggleLoading(false);
                new bootstrap.Modal(document.getElementById('successModal')).show();
            }, 2000);
        });
    });
</script> --}}
