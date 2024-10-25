<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Nama jadual dalam database

    // Kolum yang boleh diisi secara mass-assignment
    protected $fillable = ['student_id', 'tarikh', 'status', 'masa'];

    // Nyahaktifkan timestamps jika tidak diperlukan
    public $timestamps = false;

    // Relationship dengan model Pelajar
    public function pelajar()
    {
        return $this->belongsTo(Pelajar::class, 'student_id');
    }
}
