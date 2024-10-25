<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;

class PelajarController extends Controller
{
    // Papar semua pelajar
    public function index()
    {
        $pelajar = Pelajar::all(); // Mengambil semua data pelajar
        return view('admin.pelajar', compact('pelajar')); // Memaparkan pandangan pelajar
    }

    // Papar borang untuk tambah pelajar baru
    public function create()
    {
        return view('admin.create'); // Menunjukkan borang tambah pelajar
    }

    // Simpan pelajar ke dalam pangkalan data
    public function store(Request $request)
{
    try {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_pelajar' => 'required|string|max:20|unique:pelajars',
            'semester' => 'required|integer',
        ]);

        // Simpan pelajar ke dalam pangkalan data
        Pelajar::create([
            'nama' => $request->nama,
            'id_pelajar' => $request->id_pelajar,
            'semester' => $request->semester,
        ]);

        // Redirect ke senarai pelajar dengan mesej berjaya
        return redirect()->route('admin.index')->with('success', 'Pelajar berjaya ditambah!');
    } catch (\Exception $e) {
        \Log::error('Error saving student: '.$e->getMessage());
        return back()->withErrors(['error' => 'Ralat berlaku semasa menambah pelajar.']);
    }
}

}
