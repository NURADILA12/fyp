@extends('layouts.apm')
@section('content')

<!-- Kehadiran Pelajar Form -->
<div class="container my-5">
    <h1 class="display-4 fw-bold text-center text-primary mb-4">Kehadiran Pelajar</h1>

    <!-- Butang Tick Semua Hadir & Reset -->
    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-success me-2" id="tickAllHadir">Tanda Semua Hadir</button>
        <button type="button" class="btn btn-warning" id="resetPilihan">Reset Pilihan</button>
    </div>

    <form action="{{ route('apm.store') }}" method="POST">
        @csrf
        <table class="table table-hover align-middle">
            <thead class="bg-gradient text-white" style="background: linear-gradient(45deg, #007bff, #00d4ff);">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Nama Pelajar</th>
                    <th scope="col" class="text-center">Hadir</th>
                    <th scope="col" class="text-center">Tidak Hadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelajars as $index => $pelajar)
                    @php
                        $attendance = $kehadiran->where('pelajar_id', $pelajar->id)->first();
                    @endphp
                    <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td>{{ $pelajar->nama }}</td>
                        <td class="text-center">
                            <input type="radio" 
                                   name="kehadiran[{{ $pelajar->id }}]" 
                                   value="1" 
                                   class="custom-radio hadir-radio"
                                   required 
                                   {{ $attendance && $attendance->hadir ? 'checked' : '' }}>
                        </td>
                        <td class="text-center">
                            <input type="radio" 
                                   name="kehadiran[{{ $pelajar->id }}]" 
                                   value="0" 
                                   class="custom-radio tidak-hadir-radio"
                                   required 
                                   {{ $attendance && !$attendance->hadir ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-gradient btn-lg mt-4 w-100 shadow">Simpan Kehadiran</button>
    </form>
</div>

<!-- Styling -->
<style>
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .table-hover tbody tr:hover {
        background-color: #eef5f9;
        transition: background-color 0.4s ease;
    }

    th, td {
        padding: 1.2rem;
    }

    th {
        font-size: 1.2rem; /* Besarkan saiz fon */
        font-weight: 700;  /* Tambahkan ketebalan fon */
        color: #ffffff;    /* Warna teks putih */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Bayangan teks untuk lebih kontras */
        background-color: #00aaf8; /* Warna latar belakang oren terang */
        background-image: linear-gradient(45deg, #00aaf8, #015f96); /* Gradasi warna oren dan kuning */
        border-bottom: 4px solid #e64a19; /* Garis bawah untuk kesan tegas */
    }

    .custom-radio {
        width: 24px;
        height: 24px;
        appearance: none;
        border: 2px solid #ccc;
        border-radius: 50%;
        transition: 0.3s;
        cursor: pointer;
    }

    .custom-radio:checked {
        border-color: #007bff;
        background: radial-gradient(circle, #007bff 0%, #00d4ff 70%);
        box-shadow: 0 0 5px #00d4ff;
    }

    .btn-gradient {
        background: linear-gradient(45deg, #007bff, #074b58);
        border: none;
        color: white;
        font-weight: bold;
        transition: transform 0.9s, background 0.3s;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        background: linear-gradient(45deg, #0056b3, #00b2e2);
    }
</style>

<!-- JavaScript -->
<script>
    document.getElementById('tickAllHadir').addEventListener('click', function () {
        const hadirRadios = document.querySelectorAll('.hadir-radio');
        hadirRadios.forEach(radio => radio.checked = true);
    });

    document.getElementById('resetPilihan').addEventListener('click', function () {
        const allRadios = document.querySelectorAll('.custom-radio');
        allRadios.forEach(radio => radio.checked = false);
    });
</script>

@endsection
