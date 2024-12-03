<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body class="d-flex flex-column min-vh-100 bg-light text-center">

<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <main class="w-100" style="max-width: 360px;">
        
    <?php $page_session = \Config\Services::session(); ?>


        <?php 
        if($page_session->getTempdata('success')):
        ?>
            <div class="alert alert-success">
                <?= $page_session->getTempdata('success') ?>
            </div>
        <?php 
        endif;
        ?>

        <?php 
        if($page_session->getTempdata('error')):
        ?>
            <div class="alert alert-danger">
                <?= $page_session->getTempdata('error') ?>
            </div>
        <?php 
        endif;
        ?>
        
        <?= form_open(); ?>
        <?= csrf_field(); ?> 
        



        <div class="mb-4 text-center">
                    <img src="public/assests/Logo.png" alt="Logo" width="150" height="150">
                </div>
                
                <h2 class="mb-3 fw-bold" style="color:#0f3d6b ">Sign In</h2>

                <div class="mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Username" required>
            <span class="text-danger"><?= display_error($validation, 'username') ?></span>

                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
            <span class="text-danger"><?= display_error($validation, 'password') ?></span>

                </div>

                <button class="btn btn-primary btn-lg w-100 mb-3" type="submit">Sign in</button>
                <a href="<?= base_url('register') ?>" class="d-block mb-3">Register</a>
        <?= form_close();?>
    </main>
    </div>
</body>

</html>