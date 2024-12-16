<!-- app/Views/dashboard/courses/index_syllabus.php -->
<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Syllabuses</h1>
        </div>
        
        <div class="">
            <?php if (!empty($syllabuses)): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Syllabus ID</th>
                            <th>Syllabus Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($syllabuses as $syllabus): ?>
                            <tr>
                                <td><?= $syllabus['syllabus_id'] ?></td>
                                <td><?= $syllabus['syllabus_name'] ?></td>
                                <td><?= $syllabus['syllabus_year'] ?></td>
                                <td>
                                    <a href="<?= base_url('courses/syllabus_department?tab=' . strtolower(str_replace(' Syllabus', '', $syllabus['syllabus_name']))); ?>" class="btn btn-primary btn-sm">View Departments</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="alert alert-info">No syllabuses found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>