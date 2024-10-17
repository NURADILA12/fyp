<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Pelajar;
use Illuminate\Http\Request;

class ApmController extends Controller
{
    public function index() {
        $students = Pelajar::all();
        return view('apm.dashboard', compact('students'));
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
}
