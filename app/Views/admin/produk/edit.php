<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<h3 class="text-center">ubah wisata</h3>
<form action="<?= base_url('admin/produk/update');?>" method="POST" enctype="multipart/form-data"> 
    <?= csrf_field(); ?>
    <input type="hidden" name="kode" value="<?= $cari->id_wisata; ?>">
    <div class="mb-3">
        <label>Nama Wisata</label>
        <input type="text" name="nama" class="form-control" value="<?= $cari->nama_wisata; ?>">
    </div>
    <div class="mb-3">
        <label>Deskripsi Wisata</label>
        <input type="text" name="des" class="form-control" value="<?= $cari->deskripsi; ?>">
    </div>
    <div class="mb-3">
        <label>Foto Wisata</label>
        <input type="file" name="foto" class="form-control" value="">
    </div> 
    <div class="mb-3">
        <label>Harga Tiket Wisata</label>
        <input type="text" name="harga" class="form-control" value="<?= $cari->harga; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
            


<?= $this->endSection(); ?>