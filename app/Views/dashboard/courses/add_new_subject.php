<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Add New Subject</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('courses/store_subject') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label for="subject_code" class="form-label">Subject Code</label>
                        <input type="text" id="subject_code" name="subject_code" class="form-control" placeholder="Enter subject code" required>
                    </div>

                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Subject Name</label>
                        <input type="text" id="subject_name" name="subject_name" class="form-control" placeholder="Enter subject name" required>
                    </div>

                    <div class="mb-3">
                        <label for="semester_id" class="form-label">Semester</label>
                        <select id="semester_id" name="semester_id" class="form-select" required>
                            <option value="" disabled selected>Select a semester</option>
                            <?php foreach ($semesters as $semester): ?>
                                <option value="<?= $semester['semester_id'] ?>"><?= $semester['semester_number'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <input type="hidden" id="department_id" name="department_id" value="<?= $department['department_id'] ?>">
                        <input type="text" class="form-control" value="<?= $department['department_name'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="syllabus_id" class="form-label">Syllabus</label>
                        <input type="hidden" id="syllabus_id" name="syllabus_id" value="<?= $syllabus['syllabus_id'] ?>">
                        <input type="text" class="form-control" value="<?= $syllabus['syllabus_name'] ?> (<?= $syllabus['syllabus_year'] ?>)" disabled>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('courses/syllabus_subjects/' . $department['department_id'] . '/' . $syllabus['syllabus_id']) ?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Add Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
