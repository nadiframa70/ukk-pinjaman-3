<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel produks
        $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
        $table->string('nama_peminjam');
        $table->integer('jumlah_pinjam');
        $table->date('tanggal_pinjam');
        $table->enum('status', ['dipinjam', 'kembali'])->default('dipinjam');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
