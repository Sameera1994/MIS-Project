<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="">
        <div class="">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Departments</h1>
        </div>
            <div class="">
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link <?= $activeTab === 'old' ? 'active bg-secondary text-white' : ''; ?>" 
                           href="<?= base_url('courses/syllabus_department?tab=old'); ?>">Old Syllabus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activeTab === 'new' ? 'active bg-secondary text-white' : ''; ?>" 
                           href="<?= base_url('courses/syllabus_department?tab=new'); ?>">New Syllabus</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <?php if (!empty($departments)): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Syllabus</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departments as $department): ?>
                                <tr>
                                    <td><?= $department['department_id'] ?></td>
                                    <td><?= $department['department_name'] ?></td>
                                    <td><?= $department['syllabus_name'] ?></td>
                                    <td>
                                        <a href="<?= base_url('courses/department_subject/' . $department['department_id']); ?>" class="btn btn-primary btn-sm">More</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="alert alert-info">No departments found for this syllabus.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>