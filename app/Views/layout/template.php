<?=$this->extend('admin/layout/template')?>

<?= $this->Section('content') ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Tiket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url()?>">Tiket Wisata</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('home')?>">Home</a>
                        <a class="nav-link" href="<?= base_url('wisata2')?>">List Wisata</a>
                        <?php if (!session()->get('logged_in')): ?>
                          <!-- Tampilkan menu login jika belum login -->
                          <a class="nav-link" href="<?= base_url('login2') ?>">Login</a>
                          <a class="nav-link" href="<?= base_url('login') ?>">LoginAdmin</a>
                        <?php else: ?>
                          <!-- Tampilkan menu logout jika sudah login -->
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                  Hi, <?= session()->get('nama') ?>
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="<?= base_url('history'); ?>">History</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="<?= base_url('login2/keluar') ?>">Log Out</a></li>
                              </ul>
                          </li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        
        <?= $this->renderSection('content');?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<?= $this->endSection(); ?>