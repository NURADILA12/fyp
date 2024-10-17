@extends('layouts.app');
@section('content')

  <!-- Main content -->
  <div class="content">
      <h1>Senarai Laporan</h1>

      @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
      @endif


      <table class="table table-hover mt-3">
          <thead class="table-dark">
              <tr>
                  <th>Tarikh</th>
                  <th>Tajuk</th>
                  <th>Keterangan</th>
                  <th>Gambar</th>
              </tr>
          </thead>
          <tbody>
              @foreach($laporans as $laporan)
              <tr>
                  <td>{{ $laporan->tarikh }}</td>
                  <td>{{ $laporan->tajuk }}</td>
                  <td>{{ $laporan->keterangan }}</td>
                  <td><img src="/storage/uploads/{{ $laporan->gambar }}" width="100"></td>
              </tr>
              @endforeach
          </tbody>
      </table>

      <form action="{{ route('admin.laporan') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
              <label for="tarikh" class="form-label">Tarikh:</label>
              <input type="date" name="tarikh" class="form-control" required>
          </div>
          
          <div class="mb-3">
              <label for="tajuk" class="form-label">Tajuk:</label>
              <input type="text" name="tajuk" class="form-control" required>
          </div>
          
          <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan:</label>
              <textarea name="keterangan" class="form-control" required></textarea>
          </div>
          
          <div class="mb-3">
              <label for="gambar" class="form-label">Gambar:</label>
              <input type="file" name="gambar" class="form-control">
          </div>
          
          <button type="submit" class="btn btn-primary">Tambah Laporan</button>
      </form>
  </div>

 @endsection