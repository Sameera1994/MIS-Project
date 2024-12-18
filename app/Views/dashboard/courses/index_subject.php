<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Subjects for <?= $department['department_name'] ?> - <?= $syllabus['syllabus_name'] ?> (<?= $syllabus['syllabus_year'] ?>)</h1>
        </div>
           
        <div class="d-flex justify-content-between my-4 search-add-container">
            <div>
                <a class="btn btn-secondary" href="<?= base_url('courses/department_syllabus/' . $department['department_id']) ?>">Back to Syllabuses</a>
            </div>
            <div class="search-container">
                <form action="" method="get">
                    <div class="form-control border-0">
                        <input type="text" name="query" class="rounded border border-secondary-subtle p-1" placeholder="Search Subjects">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="">Add New Subject</a>
            </div>
        </div>

        <?php if (!empty($subjectsBySemester)): ?>
            <?php foreach ($subjectsBySemester as $semesterNumber => $semesterSubjects): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Semester <?= $semesterNumber ?></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($semesterSubjects as $subject): ?>
                                    <tr>
                                        <td><?= $subject['subject_code'] ?></td>
                                        <td><?= $subject['subject_name'] ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </div> 
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info text-center">
                No subjects found for this syllabus and department.
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>