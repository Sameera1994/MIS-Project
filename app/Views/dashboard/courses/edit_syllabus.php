<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 mx-auto">Edit Syllabus</h1>
        </div>

        <form action="<?= base_url('courses/update_syllabus/' . $department['department_id'] . '/' . $syllabus['syllabus_id']); ?>" method="post">
            <div class="mb-3">
                <label for="syllabus_name" class="form-label">Syllabus Name</label>
                <input type="text" class="form-control" id="syllabus_name" name="syllabus_name" value="<?= esc($syllabus['syllabus_name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="syllabus_year" class="form-label">Syllabus Year</label>
                <input type="number" class="form-control" id="syllabus_year" name="syllabus_year" value="<?= esc($syllabus['syllabus_year']) ?>" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?= base_url('courses/department_syllabus/' . $department['department_id']); ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
