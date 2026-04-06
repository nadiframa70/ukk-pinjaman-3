<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori | DEKOR ZAIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & SB Admin 2 -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }

        .card {
            border-radius: 15px;
        }

        .table thead {
            background: #4e73df;
            color: white;
        }

        .img-kategori {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }
    </style>
</head>

<body id="page-top">

<div class="container-fluid mt-5">

    <!-- Card Wrapper -->
    <div class="card shadow-lg">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary">
            <i class="fas fa-tags"></i> Data Kategori Dekor
        </h5>
        <div class="d-flex gap-2">
            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-secondary btn-sm mr-2">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            
            <a href="<?php echo e(route('kategori.create')); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
    </div>
    
        <div class="card-body">

            <!-- Alert -->
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Foto</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php if($item->foto): ?>
                                    <img src="<?php echo e(asset('storage/kategori/'.$item->foto)); ?>" class="img-kategori">
                                <?php else: ?>
                                    <span class="text-muted">Tidak ada</span>
                                <?php endif; ?>
                            </td>
                            <td class="font-weight-bold"><?php echo e($item->nama_kategori); ?></td>
                            <td><?php echo e($item->deskripsi); ?></td>
                            <td>
                                <form action="<?php echo e(route('kategori.destroy', $item->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>

</body>
</html>
<?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/kategori/index.blade.php ENDPATH**/ ?>