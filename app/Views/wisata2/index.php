<?=$this->extend('layout/template')?>

<?= $this->Section('content') ?>
<?php
function buatRp($angka)
{
    $hasil = "Rp" . number_format($angka,2,',','.');
    return $hasil;
}
?>
<div class="container py-3">
    <div class="row">
        <h3>Daftar Wisata</h3>
        <?php foreach ($wisata as $data) : ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= base_url('asset-admin/'. $data->foto);?>" style="height: 200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?= $data->nama_wisata; ?></h4>
                        <p><?= $data->deskripsi; ?></p>
                        <p>Harga Tiket : <?= buatRp($data->harga); ?>/Orang</p>
                        <a href="<?= base_url('wisata2/pesan/' . $data->id_wisata); ?>" class="btn btn-success">Booking Tiket</a>
                    </div>
                </div>
            </div> 
        <?php endforeach; ?>
    </div>
</div>


<?= $this->endSection(); ?>