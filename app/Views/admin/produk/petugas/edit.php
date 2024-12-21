<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<h3 class="text-center">Ubah Data Petugas</h3>
<?php $validation = \Config\Services::validation(); ?>
<form action="<?= base_url('admin/produk/petugas/update');?>" method="POST"> 
    <?= csrf_field(); ?>
    <input type="hidden" name="kode" value="<?= $cari->id_admin; ?>">
    <div class="mb-3">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" value="<?= $cari->nama; ?>">
        <small class="text-center text-danger"><?=$validation->getError('nama');?></small>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?= $cari->email; ?>">
        <small class="text-center text-danger"><?=$validation->getError('email');?></small>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
        <small class="text-center text-danger"><?=$validation->getError('password');?></small>
    </div> 
    <button type="submit" class="btn btn-primary">Save</button>
</form>
            


<?= $this->endSection(); ?>