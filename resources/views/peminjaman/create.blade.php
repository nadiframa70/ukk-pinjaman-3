<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mb-3">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>

                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-edit"></i> Form Peminjaman Baru</h5>
                    </div>
                    <div class="card-body p-4">
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Barang / Produk</label>
                                <select name="produk_id" class="form-select @error('produk_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Barang --</option>
                                    @foreach($produks as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->nama }} (Sisa Stok: {{ $p->stok }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('produk_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap Peminjam</label>
                                <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" 
                                       placeholder="Contoh: Budi Santoso" value="{{ old('nama_peminjam') }}" required>
                                @error('nama_peminjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Jumlah yang Dipinjam</label>
                                <input type="number" name="jumlah_pinjam" class="form-control @error('jumlah_pinjam') is-invalid @enderror" 
                                       min="1" placeholder="Masukkan angka" value="{{ old('jumlah_pinjam') }}" required>
                                @error('jumlah_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Tanggal Peminjaman</label>
                                <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" 
                                       value="{{ date('Y-m-d') }}" required>
                                @error('tanggal_pinjam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                    <i class="fas fa-save"></i> Simpan Peminjaman
                                </button>
                                <button type="reset" class="btn btn-light border text-muted">Reset Form</button>
                            </div>
                        </form>

                    </div>
                </div>

                <p class="text-center mt-4 text-muted small">Aplikasi Peminjaman Barang &copy; 2024</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>