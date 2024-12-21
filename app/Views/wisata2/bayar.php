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
                    <h4>Daftar Pembayaran Tiket Anda</h4>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Total</th>
                            <th scope="col">Bayar</th>
                            <th>Status</th>
                            <th></th>
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
                                <td><a href="<?= htmlspecialchars('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $data->snap); ?>" target="_blank">Bayar</a></td>
                                <td><?= $data->status; ?></td>
                                <td>
                                    <?php
                                    if ($data->status != 'settlement') { ?>
                                        <a href="<?= base_url('wisata2/cek/' . $data->id_pesanan); ?>" class="btn btn-success">Klik Jika Sudah Bayar</a>
                                    <?php
                                    }
                                    ?>
                                    
                                </td>
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