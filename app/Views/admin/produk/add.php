<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<h3 class="text-center">Tambah Wisata</h3>
<form action="<?= base_url('admin/produk/save');?>" method="POST" enctype="multipart/form-data"> 
    <?= csrf_field(); ?>
    <?php $validation = \Config\Services::validation(); ?>
    <div class="mb-3">
        <label>Nama Wisata</label>
        <input type="text" name="nama" class="form-control" value="<?= old('nama'); ?>">
        <small class="text-center text-danger"><?=$validation->getError('nama');?></small>
    </div>
    <div class="mb-3">
        <label>Deskripsi Wisata</label>
        <input type="text" name="des" class="form-control" value="<?= old('des'); ?>">
        <small class="text-center text-danger"><?=$validation->getError('des');?></small>
    </div>
    <div class="mb-3">
        <label>Foto Wisata</label>
        <input type="file" name="pic" class="form-control">
        <small class="text-center text-danger"><?=$validation->getError('pic');?></small>
    </div> 
    <div class="mb-3">
        <label>Harga Tiket Wisata</label>
        <input type="text" name="harga" class="form-control" value="<?= old('harga'); ?>">
        <small class="text-center text-danger"><?=$validation->getError('harga');?></small>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
            


<?= $this->endSection(); ?>