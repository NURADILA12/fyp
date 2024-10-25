<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'laporans'; // Ensure this matches your table name
    protected $fillable = ['tarikh', 'tajuk', 'keterangan', 'gambar'];
}


