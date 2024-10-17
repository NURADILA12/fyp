<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajar;

class PelajarController extends Controller
{
    // Display all students
    public function index()
    {
        $pelajar = Pelajar::all();
        return view('admin.pelajar', compact('pelajar'));
    }
    // Display form for adding student
  // Display form for adding student
public function create()
{
    return view('admin.create'); // Adjusted to your admin folder structure
}


    // Store student in the database
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_pelajar' => 'required|string|max:20|unique:pelajar',
            'semester' => 'required|integer',
        ]);

        // Save student to the database
        Pelajar::create([
            'nama' => $request->nama,
            'id_pelajar' => $request->id_pelajar,
            'semester' => $request->semester,
        ]);

        // Redirect back to list with success message
        return redirect()->route('pelajar')->with('success', 'Pelajar berjaya ditambah!');
    }

}
