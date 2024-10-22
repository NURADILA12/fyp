<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Nama jadual yang betul
    protected $fillable = ['student_id', 'date', 'status']; // Senarai kolum yang boleh diisi

    // Relationship with Pelajar model
  // Inside Kehadiran model
public function pelajar() {
    return $this->belongsTo(Pelajar::class, 'student_id');
}

}
