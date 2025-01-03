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
                        <input type="text" name="query" class="rounded border border-secondary-subtle p-1" placeholder="Search Subjects" value="<?= esc($searchQuery) ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= base_url('courses/add_subject/' . $department['department_id'] . '/' . $syllabus['syllabus_id']) ?>">Add New Subject</a>
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
                            <?php foreach ($semesterSubjects as $subject): ?>
                <tr>
                    <td><?= esc($subject['subject_code']) ?></td>
                    <td><?= esc($subject['subject_name']) ?></td>
                    <td>
                    <td>
    <div class="d-flex gap-2">
        <a href="<?= base_url('courses/edit_subject/' . $subject['subject_id']) ?>" class="btn btn-sm btn-secondary">
            Edit
        </a>
        <a href="<?= base_url('courses/view_slides/' . $subject['subject_id']) ?>" class="btn btn-sm btn-info">
            View
        </a>
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-subject-id="<?= $subject['subject_id'] ?>" data-subject-name="<?= esc($subject['subject_name']) ?>">
            Delete
        </button>
    </div>
</td>

                    </td>
                </tr>
            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                 <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the subject <span id="subjectName"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
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

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // The button that triggered the modal
        var subjectId = button.getAttribute('data-subject-id');
        var subjectName = button.getAttribute('data-subject-name');

        // Set the subject name in the modal body
        var subjectNameElement = document.getElementById('subjectName');
        subjectNameElement.textContent = subjectName;

        // Set the form action to the correct URL for the subject to delete
        var form = deleteModal.querySelector('form');
        form.action = '<?= base_url("courses/delete_subject/") ?>' + subjectId;
    });
</script>



</body>
</html>
