<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">

    <div class="">
        <div class="">
            
            <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Subjects for <?= $department['department_name'] ?> Department</h1>
        </div>
                <a href="<?= base_url('courses/syllabus_department') ?>" class="btn btn-secondary btn-sm">Back to Departments</a>
            
            <div class="">
                <?php if (!empty($semesterSubjects)): ?>
                    <?php foreach ($semesterSubjects as $semesterNumber => $subjects): ?>
                        <div class="mb-4">
                            <h5 class="bg-light p-2">Semester <?= $semesterNumber ?></h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject ID</th>
                                        <th>Subject Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($subjects as $subject): ?>
                                        <tr>
                                            <td><?= $subject['subject_id'] ?></td>
                                            <td><?= $subject['subject_name'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="alert alert-info">No subjects found for this department.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>