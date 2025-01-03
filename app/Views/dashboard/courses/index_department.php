<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="container">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Departments</h1>
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

        <!-- Search and Add New Department -->
        <div class="d-flex justify-content-between my-4 search-add-container">
            <div class="search-container">
                <form action="<?= base_url('courses/search_department') ?>" method="get">
                    <div class="form-control border-0">
                        <input 
                            type="text" 
                            name="query" 
                            class="rounded border border-secondary-subtle p-1" 
                            placeholder="Search Departments" 
                            value="<?= esc($searchQuery ?? '') ?>"> <!-- Display the search query -->
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= base_url('courses/create_department'); ?>">Add New Department</a>
            </div>
        </div>

        <!-- Departments Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Department Name</th>
                    <th>Sort Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($department) && is_array($department)): ?>
                    <?php foreach ($department as $dept): ?>
                        <?php
                            // Generate the sort name by getting the first letters of each word in department name
                            $words = explode(' ', $dept['department_name']);
                            $sortName = '';
                            foreach ($words as $word) {
                                $firstLetter = strtoupper($word[0]);
                                if ($firstLetter !== $word[0]) {
                                    // Ignore if the first letter is lowercase
                                    continue;
                                }
                                $sortName .= $firstLetter;
                            }
                        ?>
                        <tr>
                            <td><?= esc($dept['department_name']) ?></td>
                            <td><?= esc($sortName) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('courses/edit_department/' . $dept['department_id']); ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="<?= base_url('courses/delete_department/' . $dept['department_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</a>
                                    <a href="<?= base_url('courses/department_syllabus/' . $dept['department_id']); ?>" class="btn btn-primary btn-sm">View Syllabus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No departments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
