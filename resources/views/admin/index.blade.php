@extends('layouts.app') <!-- Pastikan ini merujuk kepada fail layout utama anda -->

@section('content')
<div class="content">
    <h2 class="card-title">Senarai Laporan</h2>
    
    <!-- Table untuk memaparkan laporan -->
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
            @forelse($laporan as $laporanItem) <!-- Guna forelse untuk menangani kes kosong -->
            <tr>
                <td>{{ \Carbon\Carbon::parse($laporanItem->tarikh)->format('d F Y') }}</td> <!-- Format tarikh -->
                <td>{{ $laporanItem->tajuk }}</td>
                <td>{{ $laporanItem->keterangan }}</td>
                <td>
                    <img src="{{ asset('uploads/' . $laporanItem->gambar) }}" width="100" alt="Gambar">
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tiada laporan tersedia.</td> <!-- Pesan apabila tiada data -->
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
