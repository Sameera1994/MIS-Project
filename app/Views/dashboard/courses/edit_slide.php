<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2">Edit Slide</h1>
            <a class="btn btn-secondary" href="<?= base_url('courses/view_slides/' . $slide['subject_id']) ?>">Back to Slides</a>
        </div>

        <!-- Display any success or error messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('courses/update_slide/' . $slide['id']) ?>" method="post" enctype="multipart/form-data">
            <!-- Hidden input to pass the slide ID -->
            <input type="hidden" name="id" value="<?= esc($slide['id']) ?>">
            <input type="hidden" name="subject_id" value="<?= esc($slide['subject_id']) ?>"> <!-- Include the subject_id -->

            <div class="mb-3">
                <label for="topic" class="form-label">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" value="<?= esc($slide['topic']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="slide_file" class="form-label">Slide File (PDF)</label>
                <input type="file" name="slide_file" id="slide_file" class="form-control">
                <!-- Display current file name -->
                <small>Current file: <?= esc($slide['file_name']) ?></small>
            </div>

            <button type="submit" class="btn btn-primary">Update Slide</button>
        </form>
    </div>
</main>
