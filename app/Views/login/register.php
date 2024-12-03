<?php
// Initialize validation error array
$validation = \Config\Services::validation();
$session = \Config\Services::session();

// Define validation rules
$validation->setRules([
    'name' => [
        'rules' => 'required|min_length[3]|max_length[50]',
        'errors' => [
            'required' => 'Name is required',
            'min_length' => 'Name must be at least 3 characters long',
            'max_length' => 'Name cannot exceed 50 characters'
        ]
    ],
    'department' => [
        'rules' => 'required',
        'errors' => ['required' => 'Please select a department']
    ],
    'email' => [
        'rules' => 'required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@(std\.appsc\.sab\.ac\.lk|std\.foc\.sab\.ac\.lk|sab\.ac\.lk)$/]',
        'errors' => [
            'required' => 'Email is required',
            'valid_email' => 'Please enter a valid email address',
            'regex_match' => 'Please enter a valid university email address'
        ]
    ],
    'username' => [
        'rules' => 'required|min_length[5]|is_unique[users.username]',
        'errors' => [
            'required' => 'Registration number is required',
            'min_length' => 'Registration number must be at least 5 characters long',
            'is_unique' => 'This registration number is already registered'
        ]
    ],
    'password' => [
        'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]',
        'errors' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 8 characters long',
            'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character'
        ]
    ],
    'confirmPassword' => [
        'rules' => 'required|matches[password]',
        'errors' => [
            'required' => 'Please confirm your password',
            'matches' => 'Passwords do not match'
        ]
    ]
]);
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Register</title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="public/assets/Logo.png" sizes="32x32" type="image/png">
    <style>
        .error-message {
            color: red;
            font-size: 0.6rem;
            margin-top: 0.25rem;
        }

        .btn-primary {
        background-color: #0f3d6b  !important;
        border-color: #0f3d6b !important;
        font-weight: 500;
    }
    </style>
</head>

<body class="d-flex flex-column h-100 text-center bg-light">
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <main class="w-100" style="max-width: 400px;">
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form id="registrationForm" action="<?= base_url('login/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="text-center mb-4">
                    <img src="public\assests\Logo.png" alt="Logo" width="90" height="90">
                </div>
                
                <h2 class="mb-3 fw-bold" style="color:#0f3d6b ">Register</h2>

                <div class="form-group mb-3">
                    <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" 
                        name="name" value="<?= old('name') ?>" placeholder="Name with Initials">
                    <div class="error-message">
                        <?= $validation->getError('name') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <select name="department" class="form-select <?= ($validation->hasError('department')) ? 'is-invalid' : '' ?>">
                        <option value="" disabled selected>Select Department</option>
                        <option value="Computing and Information Systems" <?= old('department') == 'Computing and Information Systems' ? 'selected' : '' ?>>
                            Computing and Information Systems
                        </option>
                        <option value="Software Engineering" <?= old('department') == 'Software Engineering' ? 'selected' : '' ?>>
                            Software Engineering
                        </option>
                        <option value="Data Science" <?= old('department') == 'Data Science' ? 'selected' : '' ?>>
                            Data Science
                        </option>
                    </select>
                    <div class="error-message">
                        <?= $validation->getError('department') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>"
                        name="email" value="<?= old('email') ?>" placeholder="University Email">
                    <div class="error-message">
                        <?= $validation->getError('email') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>"
                        name="username" value="<?= old('username') ?>" placeholder="Registration Number">
                    <div class="error-message">
                        <?= $validation->getError('username') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                        name="password" placeholder="New Password">
                    <div class="error-message">
                        <?= $validation->getError('password') ?>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control <?= ($validation->hasError('confirmPassword')) ? 'is-invalid' : '' ?>"
                        name="confirmPassword" placeholder="Confirm Password">
                    <div class="error-message">
                        <?= $validation->getError('confirmPassword') ?>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg w-100 mb-3" type="submit">Register</button>
                <!-- <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button> -->

                <a href="<?= base_url('login') ?>" class="d-block mb-2">Sign In</a>

                <a href="<?= base_url('dashboard/index_user') ?>" class="btn btn-secondary w-100 mb-2">Admin</a>
                <a href="<?= base_url('home') ?>" class="btn btn-secondary w-100">Student</a>
            </form>
        </main>
    </div>

    <footer class="mt-auto text-muted text-center">
        <p>© 2024 All Rights Reserved</p>
    </footer>

    <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            let isValid = true;
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(msg => msg.innerText = '');

            // Email validation
            const email = this.email.value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@(std\.appsc\.sab\.ac\.lk|std\.foc\.sab\.ac\.lk)$/;
            if (!emailPattern.test(email)) {
                document.querySelector('[name="email"]').nextElementSibling.innerText = 
                    "Please enter a valid email address ending with @std.appsc.sab.ac.lk or @std.foc.sab.ac.lk";
                isValid = false;
            }

            // Password validation
            const password = this.password.value;
            const confirmPassword = this.confirmPassword.value;
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            
            if (!passwordPattern.test(password)) {
                document.querySelector('[name="password"]').nextElementSibling.innerText = 
                    "Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character.";
                isValid = false;
            }

            if (password !== confirmPassword) {
                document.querySelector('[name="confirmPassword"]').nextElementSibling.innerText = 
                    "Passwords do not match.";
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>