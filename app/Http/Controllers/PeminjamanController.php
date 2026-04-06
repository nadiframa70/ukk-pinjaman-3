<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Produk;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Menampilkan daftar peminjaman (Index)
     */
    public function index()
    {
        // Ambil data peminjaman beserta relasi produknya
        $peminjamans = Peminjaman::with('produk')->latest()->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Menampilkan form untuk meminjam barang (Create)
     * FUNGSI INI YANG TADI HILANG/ERROR
     */
    public function create()
    {
        // Ambil produk yang stoknya masih ada
        $produks = Produk::where('stok', '>', 0)->get();
        return view('peminjaman.create', compact('produks'));
    }

    /**
     * Menyimpan data peminjaman ke database (Store)
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id'      => 'required|exists:produks,id',
            'nama_peminjam'  => 'required|string',
            'jumlah_pinjam'  => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Cek apakah stok cukup
        if ($produk->stok < $request->jumlah_pinjam) {
            return back()->with('error', 'Maaf, stok tidak mencukupi!');
        }

        // 1. Kurangi stok produk di tabel produks
        $produk->decrement('stok', $request->jumlah_pinjam);

        // 2. Buat data peminjaman
        Peminjaman::create([
            'produk_id'      => $request->produk_id,
            'nama_peminjam'  => $request->nama_peminjam,
            'jumlah_pinjam'  => $request->jumlah_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status'         => 'dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Berhasil meminjam barang!');
    }

    /**
     * Logika pengembalian barang
     */
    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status == 'dipinjam') {
            // Tambah kembali stok produk
            $peminjaman->produk->increment('stok', $peminjaman->jumlah_pinjam);

            // Update status peminjaman
            $peminjaman->update(['status' => 'kembali']);

            return redirect()->back()->with('success', 'Barang berhasil dikembalikan!');
        }

        return redirect()->back()->with('error', 'Barang sudah dikembalikan sebelumnya.');
    }

    /**
     * Menghapus riwayat peminjaman
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // Jika data dihapus saat masih "dipinjam", kembalikan stoknya dulu
        if ($peminjaman->status == 'dipinjam') {
            $peminjaman->produk->increment('stok', $peminjaman->jumlah_pinjam);
        }

        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus.');
    }
}