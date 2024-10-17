@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pelajar</h2>
    <form action="{{ route('pelajar.store') }}" method="POST">
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
        <button type="submit" class="btn btn-primary">Tambah Pelajar</button>
    </form>
</div>
@endsection
