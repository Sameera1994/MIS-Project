<!doctype html>
<html lang="en">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Home</title>

    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">

<style>
    .header-bg{
        background-color: #d6d6d6;
    }
</style>

</head>

<body>

    <div class="header-bg">
        <header class="p-4 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="public/assests/Logo.png" alt="Logo" width="60" height="60" class="rounded-circle">
                    <div class="d-flex align-items-center">
                        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </form> -->
                        <a href="#" class="d-block link-dark text-decoration-none mx-5"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="User" width="40" height="40" class="rounded-circle">
                        </a>
                        <a class="" href="<?= base_url('home/logout') ?>">          
                            <i class="fa-solid fa-right-from-bracket fa-xl"  style="color:#1b456e"></i>
                        </a>
                    </div>
                   
                </div>
            </div>
        </header>
    </div>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
