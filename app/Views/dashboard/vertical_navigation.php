<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="apple-touch-icon" href="public\assests\Logo.png" sizes="180x180">
    <link rel="icon" href="public\assests\Logo.png" sizes="32x32" type="image/png">
    <link rel="icon" href="public\assests\Logo.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="public\assests\Logo.png">
    <link rel="mask-icon" href="" color="#712cf9">
    <link rel="icon" href="public\assests\Logo.png">
    
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 0;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            width: 280px;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-content {
            padding-top: 1.5rem;
            height: 100%;
            background-color: #fff;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .nav-link {
            padding: 1rem 1.25rem;
            color: #0d6efd;
            transition: all 0.3s ease;
            margin: 0.25rem 0;
            white-space: nowrap;
            font-weight: 500;

        }

        
        .nav-item .nav-link.active {
    background-color: #0d6efd;
    color: white; /* Optional for better contrast */
}

        

        .nav-link i {
            font-size: 1.1rem;
            width: 1.5rem;
        }

        .menu-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 101;
            display: block;
            padding: 0.5rem;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 99;
        }

        .main-content {
            padding-top: 4rem;
        }

        /* Responsive table styles */
        .table-responsive-stack {
            display: block;
            width: 100%;
        }

        @media screen and (max-width: 767px) {
            .table-responsive-stack tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #ddd;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
                padding: 0.75rem;
                border-bottom: 1px solid #ddd;
            }

            .table-responsive-stack td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }

            .table-responsive-stack thead {
                display: none;
            }

            .search-add-container {
                flex-direction: column;
                gap: 1rem;
            }

            .search-container {
                width: 100%;
            }

            .search-container form {
                display: flex;
                gap: 0.5rem;
            }

            .search-container input {
                flex: 1;
                width: auto !important;
            }
        }

        @media (min-width: 768px) {
            .menu-toggle {
                display: none;
            }

            .sidebar {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 280px;
                padding-top: 1.5rem;
            }

            .overlay {
                display: none !important;
            }
        }
    </style>
</head>

<body>


    <!-- Menu Toggle Button -->
    <button class="menu-toggle btn" type="button" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-content">
            <ul class="nav flex-column">
            <li class="nav-item ">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('dashboard') ? 'active' : '' ?>" 
                       href="<?= base_url('dashboard') ?>">
                        <i class="bi bi-people"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('users') ? 'active' : '' ?>" 
                    href="<?= base_url('users') ?>">
                        <i class="bi bi-people"></i>
                        Students Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('courses') ? 'active' : '' ?>"
                       href="<?= base_url('courses') ?>">
                        <i class="bi bi-person-circle"></i>
                        Courses Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('admins') ? 'active' : '' ?>"
                       href="<?= base_url('admins') ?>">
                        <i class="bi bi-file-text"></i>
                        Administrators Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('reports') ? 'active' : '' ?>"
                       href="<?= base_url('reports') ?>">
                        <i class="bi bi-graph-up"></i>
                        Reports and Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 <?= current_url() === base_url('settings') ? 'active' : '' ?>"
                       href="<?= base_url('settings') ?>">
                        <i class="bi bi-gear"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 "
                       href="<?= base_url('dashboard/logout') ?>">
                        <i class="bi bi-door-closed"></i>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>