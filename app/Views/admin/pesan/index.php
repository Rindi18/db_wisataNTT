<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<div class="container py-3">
    <div class="row">
        <!-- Kolom untuk Tabel -->
        <div class="col-md-8">
            <h3 class="text-center">Halaman Order Tiket Wisata</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Wisata</th>
                        <th scope="col">Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($pesan as $data) :
                                
                    ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $data->nama_wisata; ?></td>
                        <td><?= $data->total; ?></td>
                        <td><?= $data->status; ?></td>
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