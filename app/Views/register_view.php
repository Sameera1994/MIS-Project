<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="d-flex flex-column h-100 text-center bg-light">

    <?php $page_session = \Config\Services::session(); ?>

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <main class="w-100" style="max-width: 400px;">
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
            <div class="text-center mb-4">
                <img src="public\assests\Logo.png" alt="Logo" width="90" height="90">
            </div>

            <h2 class="mb-3 fw-bold" style="color:#0f3d6b ">Register</h2>

            <div class="form-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name with Initials"
                    value="<?= set_value('name') ?>">
                <span class="text-danger"><?= display_error($validation, 'name') ?></span>

            </div>

            <div class="form-group mb-3">
                <select name="department" class="form-select">
                    <option value="" disabled selected>Select Department</option>
                    <option value="Computing and Information Systems">
                        Computing and Information Systems
                    </option>
                    <option value="Software Engineering">
                        Software Engineering
                    </option>
                    <option value="Data Science">
                        Data Science
                    </option>
                </select>
                <span class="text-danger"><?= display_error($validation, 'department') ?></span>

            </div>

            <div class="form-group mb-3">
                <input type="email" class="form-control " name="email" value="<?= set_value('email') ?>"
                    placeholder="University Email">
                <span class="text-danger"><?= display_error($validation, 'email') ?></span>

            </div>

            <div class="form-group mb-3">
                <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>"
                    placeholder="Registration Number">
                <span class="text-danger"><?= display_error($validation, 'username') ?></span>

            </div>

            <div class="form-group mb-3">
                <input type="password" class="form-control " name="password" placeholder="New Password">
                <span class="text-danger"><?= display_error($validation, 'password') ?></span>

            </div>

            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                <span class="text-danger"><?= display_error($validation, 'confirmPassword') ?></span>

            </div>

            <button class="btn btn-primary btn-lg w-100 mb-3" type="submit">Register</button>
            <!-- <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button> -->

            <a href="<?= base_url('login') ?>" class="d-block mb-2">Sign In</a>

            <?= form_close(); ?>
        </main>
    </div>

    <footer class="mt-auto text-muted text-center">
        <p>© 2024 All Rights Reserved</p>
    </footer>

</html>