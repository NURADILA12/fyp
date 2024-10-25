@extends('layouts.apm') <!-- Assuming you have a main layout file -->

@section('content')
<div class="content">
    <h2 class="card-title">Senarai Laporan</h2>

    <!-- Form for adding a new report -->
    <form action="{{ route('apm.laporan.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="tarikh" class="form-label">Tarikh</label>
            <input type="date" name="tarikh" id="tarikh" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tajuk" class="form-label">Tajuk</label>
            <input type="text" name="tajuk" id="tajuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Laporan</button>
    </form>

    <!-- Table displaying reports -->
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>Tarikh</th>
                <th>Tajuk</th>
                <th>Keterangan</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan    as $laporanItem)
            <tr>
                <td>{{ $laporanItem->tarikh }}</td>
                <td>{{ $laporanItem->tajuk }}</td>
                <td>{{ $laporanItem->keterangan }}</td>
                <td><img src="{{ asset('uploads/' . $laporanItem->gambar) }}" width="100" alt="Gambar"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
