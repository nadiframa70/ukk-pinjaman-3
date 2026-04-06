<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h4 class="mb-4">Tambah Kategori</h4>

    <form action="<?php echo e(route('kategori.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori"
                   class="form-control"
                   required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

</body>
</html><?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/kategori/create.blade.php ENDPATH**/ ?>