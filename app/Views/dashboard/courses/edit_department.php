<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Edit Department</h1>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('courses/update_department/' . $department['department_id']); ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="department_name" class="form-label">Department Name</label>
                <input type="text" 
                       class="form-control" 
                       id="department_name" 
                       name="department_name" 
                       value="<?= esc($department['department_name']) ?>" 
                       required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('courses') ?>" class="btn btn-secondary ms-2">Cancel</a>
            </div>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
