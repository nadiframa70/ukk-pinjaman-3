<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white text-center py-3">
                <h5 class="mb-0">Tambah Produk Dekor Baru</h5>
            </div>
            <div class="card-body p-4">
                
                <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Lampu Gantung Kristal" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="harga" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <select name="kategori_id" id="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kat->id); ?>"><?php echo e($kat->nama_kategori); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Jelaskan detail produk dekorasi di sini..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Foto Produk</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="form-text text-muted small">Format: jpg, png, jpeg. Maks 2MB.</div>
                    </div>

                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-outline-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kategori').addEventListener('change', function() {
            let sub = document.getElementById('sub_kategori');
            if(this.value !== "") {
                sub.disabled = false;
                // Di sini biasanya kita pakai AJAX untuk ambil data dari database
                // Ini contoh manual untuk demo tampilan:
                sub.innerHTML = '<option value="1">Sub Kategori Pilihan</option>';
            } else {
                sub.disabled = true;
                sub.innerHTML = '<option value="">-- Pilih Sub Kategori --</option>';
            }
        });
    </script>
</body>
</html><?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/produk/create.blade.php ENDPATH**/ ?>