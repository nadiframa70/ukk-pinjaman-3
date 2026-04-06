<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary"><i class="fas fa-list"></i> Daftar Peminjaman</h2>
            <div>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                <a href="<?php echo e(route('peminjaman.create')); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pinjaman</a>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover mt-2">
                    <thead class="table-dark">
                        <tr>
                            <th>Produk</th>
                            <th>Peminjam</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $peminjamans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="align-middle">
                            <td><strong><?php echo e($item->produk->nama); ?></strong></td>
                            <td><?php echo e($item->nama_peminjam); ?></td>
                            <td><?php echo e($item->jumlah_pinjam); ?> unit</td>
                            <td><?php echo e($item->tanggal_pinjam); ?></td>
                            <td>
                                <?php if($item->status == 'dipinjam'): ?>
                                    <span class="badge bg-warning text-dark px-3">Dipinjam</span>
                                <?php else: ?>
                                    <span class="badge bg-success px-3">Dikembalikan</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->status == 'dipinjam'): ?>
                                <form action="<?php echo e(route('peminjaman.kembalikan', $item->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button class="btn btn-sm btn-success shadow-sm" onclick="return confirm('Barang sudah kembali?')">
                                        <i class="fas fa-undo"></i> Kembalikan
                                    </button>
                                </form>
                                <?php endif; ?>
                                
                                <form action="<?php echo e(route('peminjaman.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger shadow-sm" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data peminjaman barang.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/peminjaman/index.blade.php ENDPATH**/ ?>