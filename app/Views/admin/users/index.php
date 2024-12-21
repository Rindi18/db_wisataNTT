<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<div class="container py-3">
    <div class="row">
        <!-- Kolom untuk Tabel -->
        <div class="col-md-8">
            <h3 class="text-center">Halaman Member Sistem</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">email</th>
                        <th scope="col">Tgl Daftar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $no = 1;
                        foreach($users as $data) :
                    ?>
                        <tr>
                            <th scope="row"><? $no; ?></th>
                            <td><?= $data->nama_users; ?></td>
                            <td><?= $data->email; ?></td>
                            <td><?= $data->created_at; ?></td>
                        </tr>
                    <?php
                        $no++;
                    endforeach; 
                    ?>
                </tbody>       
            </table>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>