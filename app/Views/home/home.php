<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img src="public/assests/Logo.png" alt="Logo" width="60" height="60" class="rounded-circle">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Grades</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="<?= esc($user['profileImage']) ?>" 
                             alt="Profile Picture" 
                             class="rounded-circle" width="auto" height="60"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <h2>Hi <?= esc($user['name']) ?>, </h2>
        <h1>Welcome to the Student Management Portal</h1>
        <p>Your gateway to academic success and updates..</p>
    </div>

    <!-- Main Content -->
    <div class="container my-5 py-4">
        <div class="row">
            <!-- Quick Access Cards -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Upcoming Assignments</h5>
                                <p class="card-text flex-grow-1">View and manage your upcoming tasks.</p>
                                <a href="#" class="btn btn-primary mt-auto">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Notifications</h5>
                                <p class="card-text flex-grow-1">Stay updated with the latest alerts.</p>
                                <a href="#" class="btn btn-primary mt-auto">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Lecture Schedule</h5>
                                <p class="card-text flex-grow-1">Access your lecture timetable.</p>
                                <a href="#" class="btn btn-primary mt-auto">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest News -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card h-100">
                    <div class="card-header text-white">
                        Latest News
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#">Exam schedules are now available.</a></li>
                            <li><a href="#">New courses added for the next semester.</a></li>
                            <li><a href="#">Library will be closed this weekend.</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-4 ">
        <div class="container text-light">
            <p class="mb-0">&copy; 2024 Student Management Portal. All rights reserved.</p>
            <a class="text-light" href="#">Privacy Policy</a> | <a href="#" class="text-light">Contact Us</a> | <a href="#" class="text-light">Help</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
