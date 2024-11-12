@extends('template.template')

@section('content')
    <div class="py-6">
        <div class="container bg-white shadow-md p-4 rounded">
            <h2 class="h4 mb-4">Obrolan Pengaduan</h2>

            <!-- Daftar Obrolan -->
            <div class="mb-6">
                @if($obrolan->isEmpty())
                    <div class="alert alert-info text-center">
                        <p>Belum ada pesan terkait laporan ini. Silakan kirim pesan pertama.</p>
                    </div>
                @else
                    @foreach($obrolan as $pesan)
                        <div class="d-flex {{ $pesan->pengirim_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }} p-2">
                            <div class="p-3 rounded {{ $pesan->pengirim_id == Auth::id() ? 'bg-primary text-white rounded-start' : 'bg-light text-dark rounded-end' }} w-75">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $pesan->pengirim->name }}</strong>
                                    <span class="text-muted small">{{ $pesan->waktu_kirim->format('d M Y H:i') }}</span>
                                </div>
                                <p class="mt-2">{{ $pesan->pesan }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Form Kirim Pesan -->
            <form method="POST" action="{{ route('obrolan.store', $laporan->id) }}">
                @csrf
                <div class="mb-4">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea name="pesan" id="pesan" class="form-control" required></textarea>
                </div>
                <input type="hidden" name="penerima_id" value="1"> <!-- Update this ID based on your requirements -->
                <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
            </form>
        </div>
    </div>
@endsection
