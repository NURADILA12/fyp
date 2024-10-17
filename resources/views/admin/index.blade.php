@extends('layouts.app') <!-- Assuming you have a main layout file -->

@section('content')
<div class="content">
    <!-- Your existing content -->
    <h2 class="card-title">Senarai Laporan</h2>
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
            @foreach($laporan as $laporanItem)
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
