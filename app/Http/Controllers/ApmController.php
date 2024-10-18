<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Pelajar;
use Illuminate\Http\Request;

class ApmController extends Controller
{
    public function index() {
        // Ambil semua pelajar
        $students = Pelajar::all();
        $pelajar_dipantau = $students->count(); // Jumlah pelajar dipantau

        // Ambil kehadiran untuk hari ini
        $kehadiran_hari_ini = Kehadiran::whereDate('date', now()->format('Y-m-d'))
            ->where('status', 'hadir')
            ->count();

        // Hitung bilangan tidak hadir
        $tidak_hadir = $pelajar_dipantau - $kehadiran_hari_ini;

        // Hantar data ke view
        return view('apm.dashboard', compact(
            'students', 'pelajar_dipantau', 'kehadiran_hari_ini', 'tidak_hadir'
        ));
    }

    public function storeAttendance(Request $request) {
        foreach ($request->attendance as $studentId => $status) {
            Kehadiran::updateOrCreate(
                ['student_id' => $studentId, 'date' => now()->format('Y-m-d')],
                ['status' => $status]
            );
        }

        return redirect()->route('apm.attendance')->with('success', 'Attendance recorded successfully!');
    }

    public function viewAttendance() {
        $attendanceRecords = Kehadiran::with('student')->get();
        return view('apm.kehadiran', compact('attendanceRecords'));
    }

    public function kehadiran() {
        return view('apm.kehadiran');
    }

    public function laporan() {
        return view('apm.laporan');
    }
}
