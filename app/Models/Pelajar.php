<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'pelajar';

    protected $fillable = ['nama', 'id_pelajar', 'semester'];
}
