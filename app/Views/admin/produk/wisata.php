<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<div class="container py-3">
    <div class="row">
        <!-- Kolom untuk Tabel -->
        <div class="col-md-8">
            <h3 class="text-center">Halaman Kelola Wisata</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Wisata</th>
                        <th scope="col">Harga</th>
                        <th>Foto</th>
                        <th scope="col">Proses</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $no = 1;
                        foreach($wisata as $data) :
                    ?>
                        <tr>
                            <th scope="row"><? $no; ?></th>
                            <td><?= $data->nama_wisata; ?></td>
                            <td><?= $data->harga; ?></td>
                            <td><img src="<?= base_url('asset-admin/'. $data->foto);?>" style="width: 100px; height:100px;" alt=""></td>
                            <td>
                                <a href=" <?= base_url('admin/produk/edit/'. $data->id_wisata);?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="<?= base_url('admin/produk/delete/'. $data->id_wisata);?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach; 
                    ?>
                </tbody>       
            </table>
            <div class="d-grid">
                <a href="<?= base_url('admin/produk/add'); ?>" class="btn btn-primary">Add</a>
            </div>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>