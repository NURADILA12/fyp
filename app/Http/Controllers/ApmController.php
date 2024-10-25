<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Pelajar;
use App\Models\Laporan; // Import the Laporan model
use Illuminate\Http\Request;

class ApmController extends Controller
{
    // Method to display the dashboard
    public function index()
    {
        // Get all students
        $students = Pelajar::all();
        $pelajar_dipantau = $students->count(); // Count of monitored students

        // Get today's attendance
        $total_hadir = Kehadiran::whereDate('date', now()->format('Y-m-d'))
            ->where('status', 'hadir') // Assuming 'hadir' means 'present'
            ->count();

        // Calculate the number of absentees
        $total_tidak_hadir = $pelajar_dipantau - $total_hadir; // Update to use $total_hadir

        // Pass data to the view
        return view('apm.dashboard', compact(
            'students', 'pelajar_dipantau', 'total_hadir', 'total_tidak_hadir' // Pass all relevant variables
        ));
    }

    // Method to store attendance records
    public function store(Request $request)
    {
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
                ['status' => $status ? 'hadir' : 'tidak hadir'] // Assuming you want to store 'hadir' or 'tidak hadir'
            );

            // Update the confirmed status for the attendance record
            if (isset($request->confirmed_status[$studentId])) {
                $attendance->confirmed = $request->confirmed_status[$studentId];
                $attendance->save();
            }
        }

        return redirect()->route('apm.kehadiran')->with('success', 'Kehadiran berjaya direkodkan!'); // Success message
    }

    // Method to show attendance records
    public function kehadiran()
    {
        $pelajars = Pelajar::all(); // Fetch all students
        $kehadiran = Kehadiran::with('pelajar')->get(); // Fetch all attendance records with related students
        return view('apm.kehadiran', compact('pelajars', 'kehadiran')); // Pass the variables to the view
    }

    // Method to show attendance form
    public function showAttendanceForm()
    {
        // It's not clear what this method is for, consider removing or implementing it as needed
        return view('apm.kehadiran'); 
    }

    // Method to display reports
    public function laporan()
    {
        // Fetching all reports
        $laporan = Laporan::all();
        
        // Passing the $laporan variable to the view
        return view('apm.laporan', compact('laporan `````')); 
    }

    public function storeLaporan(Request $request)
{
    $request->validate([
        'tarikh' => 'required|date',
        'tajuk' => 'required|string|max:255',
        'keterangan' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
    ]);

    // Store the uploaded image
    $gambarPath = $request->file('gambar')->store('uploads', 'public');

    // Create a new Laporan record
    Laporan::create([
        'tarikh' => $request->tarikh,
        'tajuk' => $request->tajuk,
        'keterangan' => $request->keterangan,
        'gambar' => $gambarPath,
    ]);

    return redirect()->route('apm.laporan')->with('success', 'Laporan berjaya ditambah!'); // Success message
}
}
