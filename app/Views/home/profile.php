<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" href="public\assests\Logo.png" sizes="180x180">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">
    <link rel="icon" href="public\assests\Logo.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="public\assests\Logo.png">
    <link rel="mask-icon" href="" color="#712cf9">
    <link rel="icon" href="public\assests\Logo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        

        /* settings */
        .settings-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-left: 90px;
            margin-right: 90px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f1f3f5;
            padding-bottom: 15px;
        }

        profile-header-info{
            margin-left: 10px;
        }
        .profile-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }
        .profile-header-info h2 {
            margin-bottom: 5px;
            font-weight: 600;
        }
        .profile-header-info p {
            color: #6c757d;
            margin-bottom: 0;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .card-stats {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        /*home*/
        body {
            background-color: #f8f9fa;
        }
        .banner {
            background: linear-gradient(90deg, #fae8bb, #3277ba, #fae8bb);
            color: white;
            text-align: center;
            padding: 30px
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header{
            background-color: #3277ba; 
        }

        .btn-primary{
            background-color: #3277ba !important;
            border: #3277ba !important;

        }

        .footer{
            background-color: #3277ba;

        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #3277ba;">
        <div class="container">
            <img src="public\uploads\profiles\default-profile.png" alt="Logo" width="60" height="60" class="rounded-circle">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Grades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('profile') ?>"><img src="<?= esc($user['profileImage']) ?>" 
                             alt="Profile Picture" 
                             class="rounded-circle" width="35" height="40"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
        <h1 class="h2 text-center mx-auto">User Profile Settings</h1>
    </div> -->
    <div class="settings-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="position-relative">
                <!-- <img  alt="Profile Picture" class="profile-image"
                    id="profileImageDisplay"> -->

                    <img src="<?= esc($user['profileImage']) ?>" 
                             alt="Profile Picture" 
                             class="rounded-circle" width="auto" height="60" id="profileImageDisplay">

                <!-- <label for="profileImageUpload" class="position-absolute bottom-0 end-0 bg-white opacity-50 text-black border border-dark  rounded-circle p-2" 
               style="cursor:pointer; width:35px; height:35px;">
               <i class="bi bi-camera position-relative"></i>
            <input type="file" id="profileImageUpload" 
                   name="profileImage" 
                   class="d-none" 
                   accept="image/jpeg,image/png,image/webp">
        </label> -->
                <label for="profileImageUpload"
                    class="position-absolute bottom-0 end-0 bg-white opacity-50 text-black border border-dark rounded-circle d-flex justify-content-center align-items-center"
                    style="cursor:pointer; width:35px; height:35px;">
                    <i class="bi bi-camera position-relative"></i>
                    <input type="file" id="profileImageUpload" name="profileImage" class="d-none"
                        accept="image/jpeg,image/png,image/webp">
                </label>
            </div>

            <div class="profile-header-info px-5">
                <h3><?= isset($user['name']) ? esc($user['name']) : 'User Profile' ?></h3>
                <p><?= isset($user['username']) ? esc($user['username']) : 'user@example.com' ?></p>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row card-stats">
            <div class="col-4 text-center">
                <h5 class="mb-2">Last Login</h5>
                <p class="text-muted"><?= date('Y-m-d H:i:s') // Replace with actual last login time ?></p>
            </div>
            <div class="col-4 text-center">
                <h5 class="mb-2">Account Created</h5>
                <p class="text-muted"><?= date('Y-m-d', strtotime($user['created_at'] ?? 'now')) ?></p>
            </div>
            <div class="col-4 text-center">
                <h5 class="mb-2">Status</h5>
                <span class="badge bg-success"><?= isset($user['status']) ? esc($user['status']) : 'default' ?></span>
            </div>
        </div>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5><i class="fas fa-times-circle me-2"></i>Validation Errors</h5>
            <?php foreach (session('errors') as $error): ?>
            <p class="mb-1">• <?= $error ?></p>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <!-- Profile Update Form -->
        <form action="<?= base_url('settings/updateProfile') ?>" method="post" id="profileUpdateForm">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-user me-2"></i>Full Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="<?= isset($user['name']) ? esc($user['name']) : '' ?>" required minlength="3"
                        maxlength="50">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email Address
                    </label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="<?= isset($user['email']) ? esc($user['email']) : '' ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">
                        <i class="fas fa-phone me-2"></i>Username
                    </label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="<?= isset($user['username']) ? esc($user['username']) : '' ?>" required
                        ">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="deparment" class="form-label">
                        <i class="fas fa-globe me-2"></i>Department
                    </label>
                    <select name="deparment" id="deparment" class="form-select">
                        <option value="se">SE</option>
                        <option value="is">IS</option>
                        <option value="ds">DS</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <i class="fas fa-bell me-2"></i>Notification Preferences
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications">
                    <label class="form-check-label" for="email_notifications">
                        Receive email notifications
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sms_notifications" name="sms_notifications">
                    <label class="form-check-label" for="sms_notifications">
                        Receive SMS notifications
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url('change-password') ?>" class="text-danger">
                    <i class="fas fa-lock me-2"></i>Change Password
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Profile
                </button>
            </div>
        </form>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('profileImageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const formData = new FormData();
    formData.append('profileImage', file);

    fetch('<?= base_url('settings/uploadProfileImage') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('profileImageDisplay').src = data.image_path;
                alert('Profile image updated successfully!');
            } else {
                alert('Error: ' + JSON.stringify(data.error));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while uploading the image.');
        });
});
</script>
</body>

</html>