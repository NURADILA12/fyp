@extends('layout.app')

@section('content')
  <div class="content">
    <!-- Alert Message -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill"></i>
      Selamat Datang di Dashboard Admin ekokuILPS!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <h1>Admin Dashboard</h1>

    <!-- Kehadiran Summary Cards -->
    <div class="row my-4">
      <div class="col-lg-4">
        <div class="card text-center p-3">
          <i class="bi bi-person-check-fill fs-1 text-success"></i>
          <h5 class="mt-3">Hadir</h5>
          <p class="fs-4">120 Pelajar</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card text-center p-3">
          <i class="bi bi-person-x-fill fs-1 text-danger"></i>
          <h5 class="mt-3">Tidak Hadir</h5>
          <p class="fs-4">25 Pelajar</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card text-center p-3">
          <i class="bi bi-people-fill fs-1 text-primary"></i>
          <h5 class="mt-3">Total Pelajar</h5>
          <p class="fs-4">145 Pelajar</p>
        </div>
      </div>
    </div>

    <!-- Kehadiran Table -->
    <div class="card p-4">
      <h2 class="card-title">Senarai Kehadiran</h2>
      <table class="table table-hover mt-3">
        <thead class="table-dark">
          <tr>
            <th>Nama Pelajar</th>
            <th>ID Pelajar</th>
            <th>Tarikh</th>
            <th>Status Kehadiran</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Aisyah Binti Ahmad</td>
            <td>20230456</td>
            <td>15 Oktober 2024</td>
            <td><span class="badge badge-success">Hadir</span></td>
          </tr>
          <tr>
            <td>Ali Bin Abu</td>
            <td>20230234</td>
            <td>15 Oktober 2024</td>
            <td><span class="badge badge-danger">Tidak Hadir</span></td>
          </tr>
          <!-- Tambah baris pelajar lainnya di sini -->
        </tbody>
      </table>
    </div>
  </div>
@endsection
