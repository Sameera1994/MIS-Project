<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Account Activation</title>
</head>
<body>
    
    
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
    
    
        <h3 class="mb-5">Account Activation Process</h3>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= esc($error); ?></div>
            <?php elseif(isset($success)): ?>
                <div class="alert alert-success"><?= esc($success); ?></div>
        <?php endif; ?>
    

        <?= form_open(); ?>
        <a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg w-100 mb-3">Sign In</a>
        <?= form_close(); ?>
    
    </div>
    
</body>
</html>


