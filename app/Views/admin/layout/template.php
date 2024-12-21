<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Alam NTT</title>
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i> <!-- Tambahkan ikon menu dari Font Awesome -->
              </div>
              
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> </a></li>
                <li><a href="<?= base_url('about')?>">About</a></li>
                <li><a href="<?= base_url('places')?>">Places</a></li>
                <li class="dropdown">
                    <a href="<?= base_url('budaya')?>" class="dropbtn">Budaya</a>
                    <div class="dropdown-content">
                        <a href="<?= base_url('upacara')?>">Upacara</a>
                        <a href="<?= base_url('baju_adat')?>">Baju Adat</a>
                        <a href="<?= base_url('festival')?>">Festival</a>
                        <a href="<?= base_url('rumah_adat')?>">Rumah Adat</a>
                        <a href="<?= base_url('tari_tradisional')?>">Tari Tradisional</a>
                    </div>
                </li>
                <li><a href="<?= base_url('pemesanan')?>">Pemesanan</a></li>
                <li><a href="<?= base_url('gallery')?>">Gallery</a></li>
                <li><a href="<?= base_url('accommodation')?>">Accommodation</a></li>
                <li><a href="<?= base_url('transportation')?>">Transportation</a></li>
            </ul>
        </nav>
    </header>

    <!--render halaman/section content -->
    <?= $this->renderSection('content');?>


    <footer>
        <p>&copy; 2024 Alam NTT </p>
    </footer>
</body>
</html>
