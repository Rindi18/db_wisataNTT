<?=$this->extend('layout/template')?>

<?= $this->Section('content') ?>
<div class="container-fluid px-0 py-0">
    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <?php foreach($wisata as $data): ?>
                        <div class="carousel-item active">
                             <img src="<?= base_url('asset-admin/'. $data->foto);?>" class="d-block w-100" style="height:350px;" alt="<?=  $data->nama_wisata;  ?>">
                        </div>
                    <?php
                    endforeach; 
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</div>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12 mb-5">
            <h3 class="text-center">Selamat datang di halaman pemesanan Tiket Wisata</h3>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>