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
    <div class="container mt-5">
        <h1>Account Activation Process</h1>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= esc($error); ?></div>
            <?php elseif(isset($success)): ?>
                <div class="alert alert-success"><?= esc($success); ?></div>
        <?php endif; ?>
    </div>
    <div>
    <a href="<?= base_url('login') ?>" class="d-block mb-2">Sign In</a>

    </div>
</body>
</html>


