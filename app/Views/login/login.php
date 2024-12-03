<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Login</title>

    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">

<style>
    .btn-primary {
        background-color: #0f3d6b  !important;
        border-color: #0f3d6b !important;
        font-weight: 500;
    }
</style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light text-center">

    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <main class="w-100" style="max-width: 360px;">
            <form method="post" action="<?= base_url().'login/login_post' ?>">
                <?= csrf_field() ?>    

                <div class="mb-4 text-center">
                    <img src="public/assests/Logo.png" alt="Logo" width="150" height="150">
                </div>
                
                <h2 class="mb-3 fw-bold" style="color:#0f3d6b ">Sign In</h2>

                <div class="mb-3">
                    <input name="username" type="text" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                </div>

                <button class="btn btn-primary btn-lg w-100 mb-3" type="submit">Sign in</button>
                <a href="<?= base_url('register') ?>" class="d-block mb-3">Register</a>
            </form>
        </main>
    </div>

    <footer class="mt-auto text-muted">
        <p>© 2024 All Rights Reserved</p>
    </footer>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
