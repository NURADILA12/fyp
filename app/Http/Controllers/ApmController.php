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
        $total_hadir = Kehadiran::whereDate('date', now()->format('Y-m-d'))
            ->where('status', 'hadir')
            ->count();
    
        // Hitung bilangan tidak hadir
        $total_tidak_hadir = $pelajar_dipantau - $total_hadir; // Update to use $total_hadir
    
        // Hantar data ke view
        return view('apm.dashboard', compact(
            'students', 'pelajar_dipantau', 'total_hadir', 'total_tidak_hadir' // Pass both variables to the view
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
        return view('apm.kehadiran', compact('attendanceData'));
    }

    public function showAttendanceForm() {
        return view('apm.kehadiran'); // Form for attendance
    }

    public function showReport() {
        return view('apm.laporan'); // Report view
    }
}
