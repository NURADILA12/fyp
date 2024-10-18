<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;

class KehadiranController extends Controller
{
    public function index()
    {
        // Dapatkan kehadiran untuk hari ini
        $kehadiran_hari_ini = Kehadiran::whereDate('tarikh', today())->get();

        // Kirim data ke view
        return view('apm.dashboard', compact('kehadiran_hari_ini'));
    }

    public function tandakanKehadiran(Request $request)
    {
        // Simpan kehadiran
        foreach ($request->kehadiran as $pelajar_id => $hadir) {
            Kehadiran::updateOrCreate(
                ['pelajar_id' => $pelajar_id, 'tarikh' => today()],
                ['hadir' => $hadir]
            );
        }
        
        Kehadiran::create([
            'student_id' => $request->student_id,
            'date' => now()->format('Y-m-d'),
            'status' => $request->status,
        ]);
        
        

        return redirect()->route('apm.kehadiran')->with('success', 'Kehadiran berjaya disimpan.');
    }
    public function dashboard()
{
    $kehadiran_hari_ini = 45; // Contoh data
    $pelajar_dipantau = 50;
    $tidak_hadir = 5;

    return view('apm.dashboard', [
        'kehadiran_hari_ini' => $kehadiran_hari_ini,
        'pelajar_dipantau' => $pelajar_dipantau,
        'tidak_hadir' => $tidak_hadir
    ]);
}

}

