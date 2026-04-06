<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * Secara default Laravel akan mencari tabel "produks".
     * Jika nama tabelmu di database adalah "produk", aktifkan baris di bawah:
     */
    // protected $table = 'produks';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Ini harus sesuai dengan kolom yang ada di database kamu.
     */
    protected $fillable = [
        'nama', 
        'harga', 
        'stok',
        'foto',

    ];

    /**
     * Jika kamu ingin kolom created_at dan updated_at dikelola otomatis,
     * biarkan properti ini bernilai true (default).
     */
    public $timestamps = true;
}