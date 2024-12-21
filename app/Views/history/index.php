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
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <h4>History Pembelian Tiket Wisata</h4>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Pengunjung Anak</th>
                            <th scope="col">Pengunjung Dewasa</th>
                            <th scope="col">Tgl Datang</th>
                            <th scope="col">Total</th>
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
                                <td><?= $data->qty_anak; ?></td>
                                <td><?= $data->qty_dewasa; ?></td>
                                <td><?= $data->tgl_datang; ?></td>
                                <td><?= $data->total; ?></td>
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
    </div>
</div>


<?= $this->endSection(); ?>