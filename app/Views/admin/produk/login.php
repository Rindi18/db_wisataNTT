<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php 
                    if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error'); ?>

                        </div>

                    
                    <?php 
                    }
                    ?>
                    
                    <h5 class="text-center">Login Admin</h5>
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('admin/produk/cek'); ?>" method="POST"> 
                        <div class="mb3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?= set_value('email');?>">
                            <small class="text-center text-danger"><?=$validation->getError('email');?></small>
                        </div>
                        <div class="mb3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?= set_value('password');?>">
                            <small class="text-center text-danger"><?=$validation->getError('password');?></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
