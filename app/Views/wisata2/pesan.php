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
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <img src="<?= base_url('asset-admin/'. $wisata->foto);?>" style="height: 200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-center">Pesan Tiket <?= $wisata->nama_wisata; ?></h4>
                        <p>Harga : <?= buatRp($wisata->harga); ?></p>
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= base_url('wisata2/proses'); ?>" method="POST">
                            <input type="hidden" name="harga" value="<?= $wisata->harga; ?>">
                            <input type="hidden" name="id" value="<?= $wisata->id_wisata; ?>">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label>Jumlah Pengunjung Anak</label>
                                <input type="text" name="anak" class="form-control" value="<?= set_value('anak'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('anak');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Jumlah Pengunjung Dewasa</label>
                                <input type="text" name="dewasa" class="form-control" value="<?= set_value('dewasa'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('dewasa');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal Kedatangan</label>
                                <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('tanggal');?></small>
                            </div>
                            <button type="submit" class="btn btn-primary">Proses</button>
                        </form>
                    </div>
                </div>
            </div> 
    </div>
</div>


<?= $this->endSection(); ?>