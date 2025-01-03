<?= view('dashboard/vertical_navigation') ?>

<div class="main-content mt-5 px-3 px-md-4">
    <h2>Edit Subject</h2>

    <!-- Success and Error Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('courses/update_subject/' . $subject['subject_id']) ?>" method="POST">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="subject_code" class="form-label">Subject Code</label>
            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?= esc($subject['subject_code']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?= esc($subject['subject_name']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Subject</button>
    </form>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>