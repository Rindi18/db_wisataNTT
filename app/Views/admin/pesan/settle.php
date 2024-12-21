<?=$this->extend('admin/layout/template2')?>

<?= $this->Section('content') ?>

<div class="container py-3">
    <div class="row">
        <!-- Kolom untuk Tabel -->
        <div class="col-md-8">
            <h3 class="text-center">Laporan Pembelian Tiket</h3>
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
                        $total = 0;
                        foreach ($pesan as $data) :
                            $total += $data->total;
                                
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
            <p>Total Pemasukan : <?= $total; ?></p>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>