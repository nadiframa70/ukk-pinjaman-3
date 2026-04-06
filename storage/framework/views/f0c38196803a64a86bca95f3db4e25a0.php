<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DEKOR ZAIN | Modern Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background: #F4F5FA; overflow-x: hidden; }
        
        /* SIDEBAR CUSTOM */
        .bg-gradient-primary { background: linear-gradient(180deg, #7B61FF 0%, #5A45E0 100%); border: none; }
        .sidebar .nav-item .nav-link { transition: 0.3s; margin: 4px 10px; border-radius: 12px; }
        .sidebar .nav-item.active .nav-link { background: rgba(255,255,255,0.2) !important; font-weight: 600; }
        .sidebar-brand-text { letter-spacing: 1px; font-weight: 700; }

        /* TOPBAR */
        .topbar { background: #fff !important; border-bottom: 1px solid #e3e6f0; }

        /* MODERN CARDS STATS */
        .card { border: none; border-radius: 20px; transition: all 0.3s ease; }
        .card-stats:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(0,0,0,0.08); }
        
        .stat-icon {
            width: 50px; height: 50px; border-radius: 15px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; margin-right: 15px;
        }
        .icon-purple { background: #EFEBFF; color: #7B61FF; }
        .icon-gold { background: #FFF8EB; color: #F5C46B; }
        .icon-green { background: #E6FFFA; color: #34D399; }

        /* TABLE DESIGN */
        .table { border-collapse: separate; border-spacing: 0 12px; }
        .table thead th { border: none; color: #abb5c2; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }
        .table tbody tr { background: #fff; border-radius: 15px; box-shadow: 0 3px 10px rgba(0,0,0,0.01); }
        .table td { border: none; padding: 1.2rem; vertical-align: middle; color: #4a5568; }
        .table td:first-child { border-radius: 15px 0 0 15px; }
        .table td:last-child { border-radius: 0 15px 15px 0; }

        /* STATUS BADGE */
        .badge-pill { padding: 8px 14px; border-radius: 10px; font-weight: 600; font-size: 11px; }
        .status-active { background: #E6FFFA; color: #059669; }
        .status-pending { background: #FFFBEB; color: #D97706; }

        /* LOGOUT BUTTON */
        .btn-logout { 
            background: #fff; color: #7B61FF !important; 
            border-radius: 12px; font-weight: 700; 
            margin: 20px 15px; border: none; transition: 0.3s;
        }
        .btn-logout:hover { background: #f8f9fc; transform: scale(1.02); }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-4" href="#">
                <div class="sidebar-brand-icon"><i class="fas fa-crown"></i></div>
                <div class="sidebar-brand-text mx-3">DEKOR ZAIN</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                    <i class="fas fa-fw fa-th-large"></i> <span>Dashboard</span>
                </a>
            </li>

            <div class="sidebar-heading mt-4 text-white-50" style="font-size: 10px;">MANAJEMEN DATA</div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('kategori.index')); ?>">
                    <i class="fas fa-fw fa-tags"></i> <span>Kategori Dekor</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('produk.index')); ?>">
                    <i class="fas fa-fw fa-couch"></i> <span>Katalog Produk</span>
                </a>
            </li>

           <li class="nav-item <?php echo e(Request::is('peminjaman*') ? 'active' : ''); ?>">
    <a class="nav-link" href="<?php echo e(route('peminjaman.index')); ?>">
        <i class="fas fa-fw fa-calendar-check"></i> 
        <span>Peminjaman</span>
    </a>
</li>

            <hr class="sidebar-divider mt-auto">

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-logout shadow-sm">
                <i class="fas fa-sign-out-alt mr-2"></i> Keluar Akun
            </button>

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 font-weight-bold">Administrator Zain</span>
                            <img class="img-profile rounded-circle shadow-sm" src="https://ui-avatars.com/api/?name=Admin+Zain&background=7B61FF&color=fff">
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 font-weight-bold">Ringkasan Rental</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card card-stats shadow-sm p-3">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon icon-purple"><i class="fas fa-file-invoice"></i></div>
                                    <div>
                                        <p class="text-muted small mb-0">Total Transaksi</p>
                                        <h3 class="font-weight-bold mb-0">128</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card card-stats shadow-sm p-3">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon icon-gold"><i class="fas fa-couch"></i></div>
                                    <div>
                                        <p class="text-muted small mb-0">Unit Tersedia</p>
                                        <h3 class="font-weight-bold mb-0">42</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card card-stats shadow-sm p-3">
                                <div class="d-flex align-items-center">
                                    <div class="stat-icon icon-green"><i class="fas fa-check-circle"></i></div>
                                    <div>
                                        <p class="text-muted small mb-0">Selesai Bulan Ini</p>
                                        <h3 class="font-weight-bold mb-0">15</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card shadow-sm border-0 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="font-weight-bold text-dark mb-0">Peminjaman Terbaru</h5>
                                    <a href="#" class="btn btn-primary btn-sm px-4 rounded-pill shadow-sm">Lihat Semua</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Penyewa</th>
                                                <th>Produk Dekor</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Ahmad Fauzi</td>
                                                <td>Pelaminan Adat Minang</td>
                                                <td>12 April 2026</td>
                                                <td><span class="badge badge-pill status-active">Sedang Disewa</span></td>
                                                <td><button class="btn btn-outline-primary btn-sm rounded-circle"><i class="fas fa-eye"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Rina Maharani</td>
                                                <td>Photo Booth Rustic</td>
                                                <td>15 April 2026</td>
                                                <td><span class="badge badge-pill status-pending">Booking</span></td>
                                                <td><button class="btn btn-outline-primary btn-sm rounded-circle"><i class="fas fa-eye"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white mt-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-muted">
                        <span>&copy; 2026 DEKOR ZAIN · Modern Rental Platform</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>
</body>
</html><?php /**PATH C:\Users\Acer Notebook\Documents\ukk peminjaman\resources\views/dashboard/index.blade.php ENDPATH**/ ?>