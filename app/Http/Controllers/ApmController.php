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
    
    public function store(Request $request) {
        // Validate the request to ensure attendance and confirmed_status are provided
        $request->validate([
            'attendance' => 'required|array',
            'attendance.*' => 'boolean', // Ensure each attendance status is a boolean
            'confirmed_status' => 'required|array', // Ensure confirmed_status is provided for each student
            'confirmed_status.*' => 'boolean', // Ensure each confirmed status is a boolean
        ]);
    
        foreach ($request->attendance as $studentId => $status) {
            // Create or update the attendance record
            $attendance = Kehadiran::updateOrCreate(
                ['student_id' => $studentId, 'date' => now()->format('Y-m-d')],
                ['status' => $status ? 'present' : 'absent'] // Assuming you want to store 'present' or 'absent'
            );
    
            // Update the confirmed status for the attendance record
            if (isset($request->confirmed_status[$studentId])) {
                $attendance->confirmed = $request->confirmed_status[$studentId];
                $attendance->save();
            }
        }
    
        return redirect()->route('apm.attendance')->with('success', 'Attendance recorded successfully!');
    }
    
    
    public function kehadiran() {
        $pelajars = Pelajar::all(); // Fetch all students
        $kehadiran = Kehadiran::with('pelajar')->get(); // Fetch all attendance records
        return view('apm.kehadiran', compact('pelajars', 'kehadiran')); // Pass the variables to the view
    }
    
    

    public function showAttendanceForm() {
        return view('apm.kehadiran'); // Form for attendance
    }

    public function laporan() {
        return view('apm.laporan'); // Report view
    }
}
