@extends('layouts.app')

@section('title', 'Senarai Kehadiran')

@section('content')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle-fill"></i>
        Senarai Kehadiran Pelajar
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="card p-4">
        <h2 class="card-title">Senarai Kehadiran</h2>
        <table class="table table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Pelajar</th>
                    <th>ID Pelajar</th>
                    <th>Tarikh</th>
                    <th>Masa</th> <!-- Tambahkan lajur Masa -->
                    <th>Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kehadirans as $index => $kehadiran)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kehadiran->pelajar->nama }}</td>
                        <td>{{ $kehadiran->pelajar->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($kehadiran->tarikh)->format('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($kehadiran->masa)->format('H:i') }}</td> <!-- Format masa -->
                        <td>
                            @if($kehadiran->status)
                                <span class="badge bg-success">Hadir</span>
                            @else
                                <span class="badge bg-danger">Tidak Hadir</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tiada rekod kehadiran tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
