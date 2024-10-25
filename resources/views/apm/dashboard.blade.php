@extends('layouts.apm')
@section('content')

<!-- Dashboard Jurulatih -->
<div class="container my-5">
    <h1 class="display-4 fw-bold text-center text-primary mb-5">Selamat Datang, {{ Auth::user()->name }}</h1>

    <!-- Image Slider -->
    <div id="imageCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-4 shadow-lg">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1200x400/?education,students" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pendidikan Berkualiti</h5>
                    <p>Meningkatkan prestasi pelajar dengan sistem kehadiran berkesan.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x400/?classroom,learning" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Suasana Pembelajaran Interaktif</h5>
                    <p>Pelajar berkembang dalam suasana positif dan produktif.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x400/?teamwork,school" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Kehadiran Bermakna</h5>
                    <p>Membina kerjasama dan disiplin melalui pemantauan yang konsisten.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelum</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Seterusnya</span>
        </button>
    </div>

    <!-- Statistik Utama -->
    <div class="row g-4 text-center">
        <div class="col-lg-6 col-md-6">
            <div class="card shadow-lg rounded-4 border-start border-5 border-success">
                <div class="card-body">
                    <h5 class="card-title text-success fw-semibold">Bilangan Keseluruhan Pelajar</h5>
                    <p class="display-4 text-warning">{{ $total_tidak_hadir }}</p>
                    <p class="card-text text-muted">Bilangan kesemua pelajar yang patut hadir.</p>
                </div>
            </div>
        </div>
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

    .carousel-item img {
        height: 400px;
        object-fit: cover;
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
