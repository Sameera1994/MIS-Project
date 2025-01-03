<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Add New Syllabus for <?= $department['department_name'] ?></h1>
        </div>

        <div class="my-4">
        <form action="<?= base_url('courses/store_syllabus/' . $department['department_id']) ?>" method="post">

                <?= csrf_field() ?>
                <input type="hidden" name="department_id" value="<?= $department['department_id'] ?>">

                <div class="mb-3">
                    <label for="syllabus_name" class="form-label">Syllabus Name</label>
                    <input type="text" id="syllabus_name" name="syllabus_name" class="form-control" placeholder="Enter syllabus name" required>
                </div>

                <div class="mb-3">
                    <label for="syllabus_year" class="form-label">Syllabus Year</label>
                    <input type="number" id="syllabus_year" name="syllabus_year" class="form-control" placeholder="Enter syllabus year (e.g., 2025)" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('courses/department_syllabus/' . $department['department_id']) ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Add Syllabus</button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
