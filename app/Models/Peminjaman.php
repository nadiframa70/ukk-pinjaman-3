<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'peminjamans';

    // Kolom yang boleh diisi
    protected $fillable = [
        'produk_id', 
        'nama_peminjam', 
        'jumlah_pinjam', 
        'tanggal_pinjam', 
        'status'
    ];

    /**
     * Relasi: Satu peminjaman memiliki (belongsTo) satu Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}