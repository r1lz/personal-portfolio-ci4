<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Admin Panel</a>
            <form class="d-flex" method="POST" action="<?= base_url('/login') ?>">
                <input type="hidden" name="_method" value="delete" />
                <button class="btn btn-danger d-none d-md-block">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <h1 class="card-title mt-3 mb-2">Pesan Masuk</h1>
        <div class="d-flex justify-content-between mb-3 d-sm-block d-md-none">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
            <a class="btn btn-success" href="<?= base_url('/admin/export-excel') ?>">Export to Excel</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td data-label="Nama"> <?= $comment['nama'] ?></td>
                            <td data-label="Email"> <?= $comment['email'] ?></td>
                            <td data-label="Subjek"> <?= $comment['subjek'] ?></td>
                            <td data-label="Pesan"> <?= $comment['pesan'] ?></td>
                            <td data-label="Tanggal"> <?= $comment['tanggal'] ?></td>
                            <td>
                                <form method="POST" action="<?= base_url('/admin/' . $comment['id']) ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus PESAN ini?')">
                                    <input type="hidden" name="_method" value="delete" />
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <h1 class="card-title mt-3 mb-2">Tentang Saya</h1>
        <form method="post" action="/" class="contact-form" id="suForm">
            <div class="form-group mb-2">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Nama Lengkap.." required>
            </div>
            <div class="form-group mb-2">
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Tulis Deskripsi Diri" required></textarea>
            </div>
            <div class="form-group mb-2">
                <input type="number" name="jumlah_project" id="jumlah_project" placeholder="Tulis Jumlah Total Project Diselesaikan.." class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <input type="number" name="jumlah_kopi" id="jumlah_kopi" placeholder="Tulis Jumlah Kopi Dihabiskan.." class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <input type="number" name="jumlah_satisfied" id="jumlah_satisfied" placeholder="Tulis Jumlah Client Terpuaskan.." class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <input type="text" name="link_cv" id="link_cv" placeholder="Sisipkan Link CV.." class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" id="submit-btn" class="btn btn-primary">Kirim</button>
            </div>
        </form> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>