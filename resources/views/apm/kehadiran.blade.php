@extends('layouts.apm')
@section('content')

<!-- Kehadiran Pelajar Form -->
<div class="container my-5">
    <h1 class="display-4 fw-bold text-center text-primary mb-4">Kehadiran Pelajar</h1>

    <form action="{{ route('apm.kehadiran.store') }}" method="POST">
      @csrf
      @foreach($pelajars as $pelajar)
          <div class="form-check">
              <input type="checkbox" class="form-check-input" name="kehadiran[{{ $pelajar->id }}]" value="1" {{ $kehadiran_hari_ini->where('pelajar_id', $pelajar->id)->first()->hadir ? 'checked' : '' }}>
              <label class="form-check-label">{{ $pelajar->nama }}</label>
          </div>
      @endforeach
      <button type="submit" class="btn btn-primary mt-3">Simpan Kehadiran</button>
  </form>
  
</div>

<!-- Styling -->
<style>
    .table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    .btn.status-btn {
        width: 180px;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn.status-btn.hadir {
        background-color: #198754;
        color: white;
    }

    .btn.status-btn.tidak-hadir {
        background-color: #dc3545;
        color: white;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .masa {
        font-style: italic;
    }

    .btn:hover {
        transform: translateY(-3px);
        transition: 0.3s;
    }
</style>

<!-- Script -->
<script>
    document.querySelectorAll('.status-btn').forEach((button, index) => {
        button.addEventListener('click', function () {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const formattedTime = `${hours}:${minutes}`;

            const masaElement = document.getElementById(`masa${index + 1}`);
            masaElement.textContent = formattedTime;

            if (this.classList.contains('hadir')) {
                this.classList.remove('hadir');
                this.classList.add('tidak-hadir');
                this.innerHTML = `<i class="bi bi-dash-circle me-2"></i> Tidak Hadir`;
            } else {
                this.classList.remove('tidak-hadir');
                this.classList.add('hadir');
                this.innerHTML = `<i class="bi bi-check-circle me-2"></i> Hadir`;
            }
        });
    });
</script>

@endsection
