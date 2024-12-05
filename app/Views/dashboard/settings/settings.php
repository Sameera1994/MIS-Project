<?= view('dashboard/vertical_navigation') ?>

<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <!-- <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
        <h1 class="h2 text-center mx-auto">Admin Profile Settings</h1>
    </div> -->
    <div class="settings-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="position-relative">
                <img src="<?= isset($admin['profileImage']) && !empty($admin['profileImage']) 
            ? base_url($admin['profileImage']) 
            : base_url('uploads/profileImages/default-profile.png') ?>" alt="Profile Picture" class="profile-image"
                    id="profileImageDisplay">

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
                <h3><?= isset($admin['name']) ? esc($admin['name']) : 'Admin Profile' ?></h3>
                <p><?= isset($admin['email']) ? esc($admin['email']) : 'admin@example.com' ?></p>
                <p><?= isset($admin['access_level']) ? esc($admin['access_level']) : 'Admin' ?></p>
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
                <p class="text-muted"><?= date('Y-m-d', strtotime($admin['created_at'] ?? 'now')) ?></p>
            </div>
            <div class="col-4 text-center">
                <h5 class="mb-2">Status</h5>
                <span class="badge bg-success">Active</span>
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
                        value="<?= isset($admin['name']) ? esc($admin['name']) : '' ?>" required minlength="3"
                        maxlength="50">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email Address
                    </label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="<?= isset($admin['email']) ? esc($admin['email']) : '' ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="telephone" class="form-label">
                        <i class="fas fa-phone me-2"></i>Telephone
                    </label>
                    <input type="tel" name="telephone" id="telephone" class="form-control"
                        value="<?= isset($admin['telephone']) ? esc($admin['telephone']) : '' ?>" required
                        pattern="[0-9]{10,15}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="timezone" class="form-label">
                        <i class="fas fa-globe me-2"></i>Time Zone
                    </label>
                    <select name="timezone" id="timezone" class="form-select">
                        <option value="UTC">UTC</option>
                        <option value="America/New_York">Eastern Time (ET)</option>
                        <option value="America/Chicago">Central Time (CT)</option>
                        <option value="America/Denver">Mountain Time (MT)</option>
                        <option value="America/Los_Angeles">Pacific Time (PT)</option>
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
</main>
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