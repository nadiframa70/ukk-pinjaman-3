<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Produk Dekor - Toko Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; }
        .img-product { 
            width: 70px; 
            height: 70px; 
            object-fit: cover; 
            border-radius: 10px; 
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-primary">Daftar Produk Dekor</h5>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-outline-secondary btn-sm px-3">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                            <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary btn-sm px-3">
                                <i class="bi bi-plus-lg"></i> Tambah Produk
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Cover</th> 
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            
                                            
                                            <td>
                                                <?php if($item->foto): ?>
                                                    <img src="<?php echo e(asset('storage/produk/' . $item->foto)); ?>" 
     class="img-product shadow-sm" 
     style="width: 70px; height: 70px; object-fit: cover;"
     alt="Foto Produk">
                                                <?php else: ?>
                                                    <img src="https://via.placeholder.com/70" class="img-product shadow-sm" alt="No Image">
                                                <?php endif; ?>
                                            </td>

                                            <td class="fw-semibold"><?php echo e($item->nama); ?></td>
                                            <td>Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?></td>
                                            <td>
                                                <span class="badge <?php echo e($item->stok > 0 ? 'bg-info' : 'bg-danger'); ?>">
                                                    <?php echo e($item->stok); ?> Unit
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" action="<?php echo e(route('produk.destroy', $item->id)); ?>" method="POST">
                                                    <a href="<?php echo e(route('produk.edit', $item->id)); ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="6" class="text-center py-5 text-muted">
                                                Data produk masih kosong.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/produk/index.blade.php ENDPATH**/ ?>