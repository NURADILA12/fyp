<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = ['tarikh', 'tajuk', 'keterangan', 'gambar'];
    protected $table = 'laporan';
}
