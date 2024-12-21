<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<div class="container py-3">
    <div class="row">
        <!-- Kolom untuk Tabel -->
        <div class="col-md-8">
            <h3 class="text-center">Halaman Kelola Petugas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">email</th>
                        <th scope="col">Proses</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $no = 1;
                        foreach($petugas as $data) :
                    ?>
                        <tr>
                            <th scope="row"><? $no; ?></th>
                            <td><?= $data->nama; ?></td>
                            <td><?= $data->email; ?></td>
                            <td>
                                <a href=" <?= base_url('admin/produk/petugas/edit/'. $data->id_admin);?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="<?= base_url('admin/produk/petugas/delete/'. $data->id_admin);?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    endforeach; 
                    ?>
                </tbody>       
            </table>
            <div class="d-grid">
                <a href="<?= base_url('admin/produk/petugas/add'); ?>" class="btn btn-primary">Add</a>
            </div>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>