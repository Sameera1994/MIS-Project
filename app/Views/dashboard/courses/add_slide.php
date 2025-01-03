<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2">Add New Slide for Subject: <?= esc($subject['subject_code']) ?></h1>
            <a class="btn btn-secondary" href="<?= base_url('courses/view_slides/' . $subject['subject_id']) ?>">Back to Slides</a>
        </div>

        <form action="<?= base_url('courses/save_slide/' . $subject['subject_id']) ?>" method="post" enctype="multipart/form-data">
            <!-- Hidden input to pass the subject_id -->
            <input type="hidden" name="subject_id" value="<?= esc($subject['subject_id']) ?>">

            <div class="mb-3">
                <label for="topic" class="form-label">Topic</label>
                <input type="text" name="topic" id="topic" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="slide_file" class="form-label">Slide File (PDF)</label>
                <input type="file" name="slide_file" id="slide_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Slide</button>
        </form>
    </div>
</main>

