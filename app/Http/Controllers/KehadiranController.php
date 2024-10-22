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
        // Validasi input (anda boleh tambah peraturan mengikut keperluan)
        $request->validate([
            'kehadiran' => 'required|array',
            'kehadiran.*' => 'required|in:1,0', // Pastikan nilai kehadiran adalah 1 atau 0

        ]);

        // Simpan atau kemaskini kehadiran berdasarkan pelajar_id dan tarikh
        foreach ($request->kehadiran as $pelajar_id => $hadir) {
            Kehadiran::updateOrCreate(
                [
                    'pelajar_id' => $pelajar_id,
                    'tarikh' => today()  // Simpan tarikh hari ini
                ],
                [
                    'hadir' => $hadir  // Nilai kehadiran
                ]
            );
        }

        // Kembalikan mesej berjaya selepas menyimpan
        return redirect()->route('apm.kehadiran')->with('success', 'Kehadiran berjaya disimpan.');
    }

    public function dashboard()
    {
        // Data contoh untuk dipaparkan pada dashboard
        $kehadiran_hari_ini = Kehadiran::whereDate('tarikh', today())->count(); // Contoh dinamik
        $pelajar_dipantau = 50;  // Contoh nilai statik
        $tidak_hadir = Kehadiran::whereDate('tarikh', today())->where('hadir', 0)->count(); // Contoh dinamik

        // Hantar data ke view
        return view('apm.dashboard', [
            'kehadiran_hari_ini' => $kehadiran_hari_ini,
            'pelajar_dipantau' => $pelajar_dipantau,
            'tidak_hadir' => $tidak_hadir
        ]);
    }
}
