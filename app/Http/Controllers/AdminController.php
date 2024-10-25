<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Pelajar;
use App\Models\Kehadiran;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.dashboard');
    }

    public function hazikh()
    {
       return view('admin.index');
    }

    public function laporan()
    {
        // Ambil semua laporan dari pangkalan data
        $laporan = Laporan::all(); // Anda mungkin ingin menambah pengendalian tambahan seperti pagination atau order

        // Hantar data ke pandangan
        return view('admin.laporan', compact('laporan')); // Pastikan nama pandangan betul
    }

    public function store(Request $request)
    {
        $request->validate([
            'tarikh' => 'required',
            'tajuk' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|nullable|max:1999',
        ]);

        // Handle file upload
        if($request->hasFile('gambar')) {
            $fileNameWithExt = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('gambar')->storeAs('public/uploads', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        Laporan::create([
            'tarikh' => $request->tarikh,
            'tajuk' => $request->tajuk,
            'keterangan' => $request->keterangan,
            'gambar' => $fileNameToStore,
        ]);

        return redirect()->route('admin.laporan')->with('success', 'Laporan berjaya ditambah!');
    }

    public function pelajar()
{
    $students = Pelajar::all(); // Assuming you have a Student model
    return view('admin.students', compact('students'));
}

public function storeStudent(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'registration_number' => 'required',
    ]);

    Pelajar::create($request->all());

    return redirect()->route('admin.students')->with('success', 'Student added successfully!');
}

// Optional: Add methods for updating and deleting students

public function kehadiran()
{
    $students = Pelajar::all();
    return view('admin.kehadiran', compact('students'));
}



}
