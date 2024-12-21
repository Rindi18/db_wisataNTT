<?php

use App\Controllers\Login2;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <h3 class="text-center mt-3">Register Akun Baru</h3>
                    <?php $validation = \Config\Services::validation(); ?>
                    <div class="card-body">
                        <form action="<?= base_url('login2/save')?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('nama');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" class="form-select">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <small class="text-center text-danger"><?=$validation->getError('kelamin');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Nomor Handphone</label>
                                <input type="text" name="ponsel" class="form-control" value="<?= set_value('ponsel'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('email');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('email');?></small>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="<?= set_value('password'); ?>">
                                <small class="text-center text-danger"><?=$validation->getError('password');?></small>
                            </div>
                            <div class="d-grid d-md-block">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>                             
                        </form>
                    </div>
                </div>

            </div>

        </div>
   </div> 
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>