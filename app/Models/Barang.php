<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'deskripsi',
        'stok',
        'harga',
        'posisi',
        'foto'
    ];
}
