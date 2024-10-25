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

    <form action="{{ route('kehadiran.store') }}" method="POST" id="kehadiranForm">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="text-center">Hadir</th>
                    <th class="text-center">Tidak Hadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pelajars as $index => $pelajar)
                    <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td>{{ $pelajar->nama }}</td>
                        <td class="text-center">
                            <input type="radio" 
                                   name="kehadiran[{{ $pelajar->id }}]" 
                                   value="1" 
                                   class="custom-radio hadir-radio">
                        </td>
                        <td class="text-center">
                            <input type="radio" 
                                   name="kehadiran[{{ $pelajar->id }}]" 
                                   value="0" 
                                   class="custom-radio tidak-hadir-radio">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary btn-gradient" id="submitButton">Submit Attendance</button>
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
        font-size: 1.2rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .custom-radio {
        width: 24px;
        height: 24px;
        appearance: none;
        border: 2px solid #ccc;
        border-radius: 50%;
        cursor: pointer;
        transition: 0.3s;
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
        transition: transform 0.3s, background 0.3s;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        background: linear-gradient(45deg, #0056b3, #00b2e2);
    }

    .disabled {
        pointer-events: none;
        opacity: 0.6;
    }
</style>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('tickAllHadir').addEventListener('click', function () {
        document.querySelectorAll('.hadir-radio').forEach(radio => {
            radio.checked = true;
        });

        alert('Semua pelajar telah ditandakan hadir.');
    });

    document.getElementById('resetPilihan').addEventListener('click', function () {
        document.querySelectorAll('.custom-radio').forEach(radio => {
            radio.checked = false;
        });

        alert('Pilihan telah di-reset.');
    });

    // Event submit dengan popup SweetAlert
    const form = document.getElementById('kehadiranForm');
    const submitButton = document.getElementById('submitButton');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Halang submit buat sementara

        Swal.fire({
            icon: 'success',
            title: 'Kehadiran telah dihantarkan ke Admin!',
            showConfirmButton: false,
            timer: 2000 // Popup hilang selepas 2 saat
        }).then(() => {
            submitButton.classList.add('disabled');
            submitButton.textContent = 'Submitting...';
            form.submit(); // Hantar borang selepas popup
        });
    });
</script>

@endsection
