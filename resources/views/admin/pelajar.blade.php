@extends('layouts.app');
@section('content')
  <!-- Main content -->
  <div class="content">
    <!-- Alert Message -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <i class="bi bi-info-circle-fill"></i>
      Selamat Datang di Kehadiran ekokuILPS!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Toggle Add Student Button -->
    <button class="btn btn-primary mb-3" onclick="toggleForm()">Tambah Pelajar</button>

    <!-- Tambah Pelajar Form -->
    <div class="card p-4 add-student-form" id="addStudentForm">
      <h3 class="card-title">Tambah Pelajar</h3>
      <form action="{{route('pelajar.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Pelajar</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="id_pelajar" class="form-label">ID Pelajar</label>
          <input type="text" class="form-control" id="id_pelajar" name="id_pelajar" required>
        </div>
        <div class="mb-3">
          <label for="semester" class="form-label">Semester</label>
          <select class="form-select" id="semester" name="semester" required>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <!-- Add more semesters if needed -->
          </select>
        </div>
        <button type="submit" class="btn btn-success">Tambah Pelajar</button>
      </form>
    </div>

    <!-- Kehadiran Table -->
    <div class="card p-4 mt-4">
      <h2 class="card-title">Senarai Kehadiran</h2>
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>ID Pelajar</th>
            <th>Semester</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pelajar as $pelajar)
          <tr>
            <td>{{ $pelajar->nama }}</td>
            <td>{{ $pelajar->id_pelajar }}</td>
            <td>{{ $pelajar->semester }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection