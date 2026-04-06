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

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

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

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

</body>
</html>