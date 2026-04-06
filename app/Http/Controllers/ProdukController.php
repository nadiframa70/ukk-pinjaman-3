<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori; // Tambahkan ini agar tidak perlu menulis path lengkap
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk urusan file

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk (Halaman Utama).
     */
    public function index()
    {
        $produk = Produk::all(); 
        return view('produk.index', compact('produk'));
    }

    /**
     * Menampilkan form untuk tambah produk.
     */
    public function create()
    {
        // Ambil semua kategori untuk isi dropdown
        $kategoris = Kategori::all(); 
        
        return view('produk.create', compact('kategoris'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'kategori_id' => 'required',
            'foto'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        $data = $request->all();

        // LOGIKA SIMPAN FOTO (DISESUAIKAN KE STORAGE/APP/PUBLIC)
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            // Membuat nama unik berdasarkan timestamp
            $nama_file = time() . "_" . $file->getClientOriginalName();
            
            /**
             * Perintah storeAs('folder', 'nama_file', 'disk')
             * 'produk' = folder di dalam storage/app/public
             * 'public' = disk yang terhubung dengan folder public/storage
             */
            $file->storeAs('produk', $nama_file, 'public');
            
            // Simpan hanya nama filenya saja ke kolom 'foto' di database
            $data['foto'] = $nama_file;
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        // Opsional: Hapus file fisik dari storage saat data dihapus
        if ($produk->foto) {
            Storage::disk('public')->delete('produk/' . $produk->foto);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}