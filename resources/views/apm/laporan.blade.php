@extends('layouts.apm')
@section('content')

<div class="container mt-5">
    <h3 class="text-center mb-4">Hantar Laporan</h3>
    
    <div class="card shadow">
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tajuk Laporan -->
                <div class="form-group mb-4">
                    <label for="report_title" class="form-label">Tajuk Laporan</label>
                    <input type="text" name="report_title" id="report_title" class="form-control" placeholder="Masukkan tajuk laporan" required>
                </div>

                <!-- Deskripsi Laporan -->
                <div class="form-group mb-4">
                    <label for="report_desc" class="form-label">Deskripsi Laporan</label>
                    <textarea name="report_desc" id="report_desc" class="form-control" rows="5" placeholder="Terangkan laporan anda di sini" required></textarea>
                </div>

                <!-- Masa -->
                <div class="form-group mb-4">
                    <label for="report_time" class="form-label">Masa Kejadian</label>
                    <input type="time" name="report_time" id="report_time" class="form-control" required>
                </div>

                <!-- Tarikh -->
                <div class="form-group mb-4">
                    <label for="report_date" class="form-label">Tarikh Kejadian</label>
                    <input type="date" name="report_date" id="report_date" class="form-control" required>
                </div>

                <!-- Tempat Kejadian -->
                <div class="form-group mb-4">
                    <label for="report_location" class="form-label">Tempat Kejadian</label>
                    <input type="text" name="report_location" id="report_location" class="form-control" placeholder="Lokasi kejadian" required>
                </div>

                <!-- Muat Naik Fail (Opsional) -->
                <div class="form-group mb-4">
                    <label for="report_file" class="form-label">Muat naik fail (opsional)</label>
                    <input type="file" name="report_file" id="report_file" class="form-control">
                </div>

                <!-- Button Hantar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-5">Hantar Laporan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Logout Button -->
<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-5 text-center">
    @csrf
    <button type="submit" class="btn btn-danger">
      <i class="bi bi-box-arrow-right"></i> Logout
    </button>
</form>

@endsection
