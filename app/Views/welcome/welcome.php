<!doctype html>
<html lang="en" class="h-100">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Welcome</title>

    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">
    <style>
        .btn-primary{
            background-color: #13487d !important;
            border: #13487d !important;
            font-weight:500;
        }
    </style>
</head>

<body class="d-flex flex-column h-100 text-center bg-light">

    <div class="container d-flex flex-column justify-content-center align-items-center p-3 mx-auto flex-grow-1">
        <main class="px-3">
            <div class="d-flex justify-content-center">
                <img class="mb-4" src="public/assests/Logo.png" alt="Logo" width="150" height="150">
            </div>
            <h1>Welcome to the Student Management Portal</h1>
            <p class="lead">Manage courses, assignments, and student information in one place for administrators.
                Students can view course details.</p>
            <p class="lead">
                <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg ">Sign In</a>
            </p>
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
