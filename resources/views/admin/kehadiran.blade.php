@extends('layouts.app')

@section('title', 'Kehadiran')

@section('content')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill"></i>
      Selamat Datang di Kehadiran ekokuILPS!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

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
          <!-- Tambah baris pelajar lain di sini -->
        </tbody>
      </table>
    </div>
@endsection
