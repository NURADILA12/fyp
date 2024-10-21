@extends('layouts.apm')
@section('content')

<!-- Dashboard Jurulatih -->
<div class="container my-5">
    <h1 class="display-4 fw-bold text-center text-primary mb-5">Selamat Datang, {{ Auth::user()->name }}</h1>

    <!-- Statistik Utama -->
    <div class="row g-4 text-center">
        <!-- Kehadiran Hari Ini -->
        <div class="col-lg-6 col-md-6">
            <div class="card shadow-lg rounded-4 border-start border-5 border-success">
                <div class="card-body">
                    <h5 class="card-title text-success fw-semibold">Kehadiran Hari Ini</h5>
                    <p class="display-4 text-warning">{{ $total_tidak_hadir }}</p>
                    <p class="card-text text-muted">Bilangan pelajar yang tidak hadir hari ini. Sila ambil tindakan susulan.</p>
                </div>
            </div>
        </div>

        <!-- Tidak Hadir -->
        <div class="col-lg-6 col-md-6">
            <div class="card shadow-lg rounded-4 border-start border-5 border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning fw-semibold">Tidak Hadir</h5>
                    <p class="display-4 text-success">{{ $total_hadir }}</p>
                    <p class="card-text text-muted">Bilangan pelajar yang hadir hari ini.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Butang Tindakan Cepat -->
    <div class="row mt-4 text-center">
        <div class="col-lg-6 mb-3">
            <a href="{{ route('apm.kehadiran') }}" class="btn btn-primary btn-lg px-4 shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Tandakan kehadiran pelajar">
                <i class="bi bi-clipboard-check me-2"></i> Tandakan Kehadiran
            </a>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('apm.laporan') }}" class="btn btn-info btn-lg px-4 shadow-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat laporan kehadiran">
                <i class="bi bi-file-earmark-bar-graph me-2"></i> Laporan Kehadiran
            </a>
        </div>
    </div>
</div>

<!-- Styling -->
<style>
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .btn {
        width: 100%;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
        transform: translateY(-3px);
    }

    .list-group-item {
        border: none;
        font-size: 1.1rem;
    }
</style>

@endsection
