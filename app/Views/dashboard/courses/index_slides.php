<?= view('dashboard/vertical_navigation') ?>


<style>
/* Ensure buttons within the group are tightly spaced */
.btn-group .btn {
    margin-right: 5px; /* Adjust spacing as needed */
}

/* Optional: Remove the margin from the last button to prevent extra space */
.btn-group .btn:last-child {
    margin-right: 0;
}
</style>




<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2">Slides for Subject: <?= esc($subject['subject_code']) ?> - <?= esc($subject['subject_name']) ?></h1>

            <a class="btn btn-secondary" href="<?= base_url('courses') ?>">Back to Subjects</a>
        </div>

        <div class="mb-4">
            <a class="btn btn-success" href="<?= base_url('courses/add_slide/' . $subject['subject_id']) ?>">Add New Slide</a>
        </div>

        <?php if (!empty($slides)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Slide ID</th>
                        <th>Topic</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slides as $slide): ?>
                        <tr>
                            <td><?= esc($slide['id']) ?></td>
                            <td><?= esc($slide['topic']) ?></td>
                            <td>
                                <!-- Button Group for action buttons -->
                                <div class="btn-group">
                                    <a href="<?= base_url('courses/download_slide/' . basename($slide['file_name'])) ?>" class="btn btn-primary">Download</a>
                                    <a href="<?= base_url('courses/edit_slide/' . $slide['id']) ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('courses/delete_slide/' . esc($slide['id'])) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this slide?')">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info text-center">No slides available for this subject.</div>
        <?php endif; ?>
    </div>
</main>



