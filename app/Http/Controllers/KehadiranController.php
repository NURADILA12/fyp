<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    // Paparkan kehadiran untuk APM
    public function index()
    {
        // Ambil kehadiran untuk hari ini
        $kehadiran_hari_ini = Kehadiran::whereDate('tarikh', Carbon::today())->get();

        // Hantar data ke view APM dashboard
        return view('apm.dashboard', compact('kehadiran_hari_ini'));
    }

    // Simpan kehadiran baru
    public function store(Request $request)
    {
        foreach ($request->kehadiran as $student_id => $hadir) {
            // Semak jika kehadiran sudah direkodkan untuk hari ini
            $existing = Kehadiran::where('student_id', $student_id)
                ->whereDate('tarikh', Carbon::today())
                ->first();

            if (!$existing) {
                // Simpan rekod baru hanya jika tiada rekod sebelum ini
                Kehadiran::create([
                    'student_id' => $student_id,
                    'status' => $hadir,
                    'tarikh' => Carbon::today(),
                    'masa' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Attendance updated successfully');
    }

    // Fungsi untuk tandakan kehadiran ramai pelajar
    public function tandakanKehadiran(Request $request)
    {
        $request->validate([
            'kehadiran' => 'required|array',
            'kehadiran.*' => 'required|in:1,0',
        ]);

        foreach ($request->kehadiran as $student_id => $hadir) {
            // Semak jika rekod sudah wujud untuk hari ini
            $existing = Kehadiran::where('student_id', $student_id)
                ->whereDate('tarikh', Carbon::today())
                ->first();

            if (!$existing) {
                Kehadiran::create([
                    'student_id' => $student_id,
                    'status' => $hadir,
                    'tarikh' => Carbon::today(),
                    'masa' => now(),
                ]);
            }
        }

        return redirect()->route('apm.kehadiran')->with('success', 'Kehadiran berjaya disimpan.');
    }

    // Paparkan data di APM dashboard
    public function dashboard()
    {
        $kehadiran_hari_ini = Kehadiran::whereDate('tarikh', Carbon::today())->count();
        $pelajar_dipantau = 50; // Contoh nilai statik
        $tidak_hadir = Kehadiran::whereDate('tarikh', Carbon::today())
            ->where('status', 0) // Guna 'status' dan bukan 'hadir'
            ->count();

        return view('apm.dashboard', [
            'kehadiran_hari_ini' => $kehadiran_hari_ini,
            'pelajar_dipantau' => $pelajar_dipantau,
            'tidak_hadir' => $tidak_hadir,
        ]);
    }

    // Paparkan data di admin dashboard
    public function adminDashboard()
    {
        // Ambil semua kehadiran bersama maklumat pelajar
        $kehadiran = Kehadiran::with('pelajar')
            ->whereDate('tarikh', Carbon::today())
            ->get();

        return view('admin.dashboard', compact('kehadiran'));
    }

    public function adminIndex()
    {
        // Ambil semua data kehadiran dari database bersama pelajar yang berkaitan
        $kehadirans = Kehadiran::with('pelajar')->orderBy('tarikh', 'desc')->get();

        // Paparkan view kehadiran admin
        return view('admin.kehadiran', compact('kehadirans'));
    }
}


