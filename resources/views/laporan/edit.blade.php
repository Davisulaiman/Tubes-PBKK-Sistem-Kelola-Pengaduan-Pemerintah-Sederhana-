@extends('template.template')

@section('content')
<div class="container mt-5">
    <h2>Edit Laporan</h2>
    <form action="{{ route('laporan.update', ['id' => $laporan->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $laporan->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan" required>{{ $laporan->keluhan }}</textarea>
        </div>

        <!-- Add more fields as necessary -->

        <button type="submit" class="btn btn-primary">Update Laporan</button>
    </form>
</div>
@endsection
