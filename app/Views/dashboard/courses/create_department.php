<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Add New Department</h1>
        </div>

        <!-- Display Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Department Form -->
        <form action="<?= base_url('courses/store_department') ?>" method="POST">
            <div class="mb-3">
                <label for="department_name" class="form-label">Department Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="department_name" 
                    name="department_name" 
                    placeholder="Enter Department Name" 
                    required
                >
            </div>

            <!-- Optional: Department ID (if applicable) -->
            <div class="mb-3">
                <label for="department_id" class="form-label">Department ID (optional)</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="department_id" 
                    name="department_id" 
                    placeholder="Enter Department ID" 
                >
            </div>

            <button type="submit" class="btn btn-success">Add Department</button>
            <a href="<?= base_url('courses') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
