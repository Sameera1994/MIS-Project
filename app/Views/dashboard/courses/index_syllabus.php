<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Syllabuses for <?= $department['department_name'] ?></h1>
        </div>
           
        <div class="d-flex justify-content-between my-4 search-add-container">
            <div>
                <a class="btn btn-secondary" href="<?= base_url('courses') ?>">Back to Departments</a>
            </div>
            <div class="search-container">
                <form action="" method="get">
                    <div class="form-control border-0 d-flex gap-2">
                        <input 
                            type="text" 
                            name="query" 
                            value="<?= isset($searchQuery) ? esc($searchQuery) : '' ?>" 
                            class="form-control rounded border border-secondary-subtle p-1" 
                            placeholder="Search Syllabuses">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= base_url('courses/add_new_syllabus/' . $department['department_id']) ?>">Add New Syllabus</a>
            </div>
        </div>

        <div class="">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Syllabus ID</th>
                        <th>Syllabus Name</th>
                        <th>Syllabus Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($syllabuses)): ?>
                        <?php foreach ($syllabuses as $syllabus): ?>
                            <tr>
                                <td><?= esc($syllabus['syllabus_id']) ?></td>
                                <td><?= esc($syllabus['syllabus_name']) ?></td>
                                <td><?= esc($syllabus['syllabus_year']) ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                    <a href="<?= base_url('courses/edit_syllabus/' . $department['department_id'] . '/' . $syllabus['syllabus_id']); ?>" class="btn btn-sm btn-secondary">Edit</a>

                                        <a href="<?= base_url('courses/delete_syllabus/' . $department['department_id'] . '/' . $syllabus['syllabus_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this syllabus?')">Delete</a>
                                        <a href="<?= base_url('courses/syllabus_subjects/' . $department['department_id'] . '/' . $syllabus['syllabus_id']); ?>" class="btn btn-primary btn-sm">View Subjects</a>
                                    </div> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No syllabuses found for this department.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
