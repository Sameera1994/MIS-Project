<?= view('dashboard/vertical_navigation') ?>

<?php 
        $currentUrl = current_url();
        $isUsersActive = strpos($currentUrl, base_url('users')) === 0;
        $isCoursesActive = strpos($currentUrl, base_url('courses')) === 0;
        $isAdminsActive = strpos($currentUrl, base_url('admins')) === 0;
    ?>

<main class="main-content px-3 px-md-4">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Reports and Analytics</h1>
        </div>
 
        

    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() === base_url('enrollment') ? 'active' : '' ?>" 
                           href="<?= base_url('enrollment') ?>">Enrollment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() === base_url('attendance') ? 'active' : '' ?>" 
                           href="<?= base_url('attendance') ?>">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() === base_url('result') ? 'active' : '' ?>" 
                           href="<?= base_url('result') ?>">Result</a>
                    </li>
                </ul>
            </div>
            
    
