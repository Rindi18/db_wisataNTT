<?=$this->extend('admin/layout/template')?>

<?= $this->Section('content') ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back End Tiket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Tiket Wisata</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="<?= base_url('wisata')?>">Wisata</a>
                        <a class="nav-link" href="<?= base_url('petugas')?>">Admin</a>
                        <a class="nav-link" href="<?= base_url('member')?>">Member</a>
                        <a class="nav-link" href="<?= base_url('pesan')?>">Order Tiket</a>
                        <a class="nav-link" href="<?= base_url('pesan/settle')?>">Laporan Tiket</a>
                        <a class="nav-link" href="<?= base_url('keluar')?>">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container py-3">
            <div class="row">
                <div class="col-md-8 mb-5">
                <?= $this->renderSection('content');?>
                </div>
                <div class="col-md-3 ms-5 d-flex flex-column">
                    <h5>List Wisata</h5>
                    <?php
                        $db = \Config\Database::connect();
                        $builder = $db->table('wisata')->get()->getResult();
                    ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($builder as $data) : ?>
                        <li class="list-group-item"><?= $data->nama_wisata; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
            
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?= $this->endSection(); ?>