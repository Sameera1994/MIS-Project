<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="public\assests\Logo.png" sizes="180x180">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">
    <link rel="icon" href="public\assests\Logo.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="public\assests\Logo.png">
    <link rel="mask-icon" href="" color="#712cf9">
    <link rel="icon" href="public\assests\Logo.png">
    <meta name="theme-color" content="#712cf9">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    .bg-login {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 2px 2px 100px rgba(0, 0, 0, .5);

    }

    .bg-login-2 {
        background-color: <?=Light ?>;
    }

    .custom-btn {

        background-color: #2b3d70;
        color: #ffffff;
        /* Change text color to dark when hovered */
        /* Default dark background */
        transition: background-color 0.3s ease;
        /* Smooth transition for hover */
    }

    .custom-btn:hover {
        background-color: #275196;
        /* Change to white on hover */
        color: #ffffff;
        /* Change text color to dark when hovered */
    }

    .input_box{
        background-color: #ffffff;
        padding: 8px;
        margin-bottom: 5px;
        border-radius: 10px;
        border: #ffffff;
    }

    .form-control{
        background-color: #ffffff;
        border: #ffffff;
        margin-bottom: 5px;
        padding: 8px;
    }
    h2{
        color:#2b3d70;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.3/examples/sign-in/sign-in.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100 text-center bg-login bg-login-2">

    <div class="cover-container d-flex flex-column justify-content-center align-items-center p-3 mx-auto flex-grow-1">
        <main class="px-3">

        <form action="<?= base_url('login/store') ?>" method="post">
    <?= csrf_field() ?> <!-- CSRF protection -->
     <div class="d-flex justify-content-center">
                    <img class="mb-4" src="public\assests\Logo.png" alt="" width="90" height="90"> 

                </div>
                <h2 class=" mb-3">Register</h2>
    <div class="form-group mb-3">
        <!-- <label for="name">Name with Initials:</label> -->
        <input type="text" class="form-control" name="name" value="<?= old('name') ?>" placeholder="Name with Initials">
    </div>

    <div class="form-group mb-3">
        <!-- <label for="email">University Email:</label> -->
        <input type="email" class="form-control" name="email" value="<?= old('email') ?>" placeholder="University Email">
    </div>

    <div class="form-group mb-3">
        <!-- <label for="username">Registration Number/Username:</label>  -->
        <!-- Students can use their registration number and administrators can use admin. -->
        <input type="text" class="form-control" name="username" value="<?= old('username') ?>" placeholder="Registration Number">
    </div>

    <div class="form-group mb-3">
        <!-- <label for="password">New Password:</label> -->
        <input type="password" class="form-control" name="password" placeholder="New Password">
    </div>

    <div class="form-group mb-3">
        <!-- <label for="confirmPassword">Confirm Password:</label> -->
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    
    <a href="<?= base_url('login')?>" class="">SignIn</a>


    <a href="<?= base_url('dashboard/index_user') ?>" class="btn btn-lg border-0  custom-btn">Admin</a>
                <a href="<?= base_url('home') ?>" class="btn btn-lg border-0  custom-btn">Student</a>
</form>
        </main>
    </div>

    <footer class="mt-auto text-black-50">
        <p>© 2024 All Rights Reserved</p>
    </footer>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>