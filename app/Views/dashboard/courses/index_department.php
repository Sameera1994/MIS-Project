<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
    <div class="">
        <div class="">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Departments</h1>
        </div>
           
        <div class="d-flex justify-content-between my-4 search-add-container">
        
            <div class="search-container">
                <form action="" method="get">
                    <div class="form-control border-0">
                        <input type="text" name="query" class="rounded border border-secondary-subtle p-1" placeholder="Search Departments">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="">Add New Department</a>
            </div>
        </div>

            <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($department as $department): ?>
                                <tr>
                                    <td><?= $department['department_id'] ?></td>
                                    <td><?= $department['department_name'] ?></td>
                                    
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            <a href="<?= base_url('courses/department_syllabus/' . $department['department_id']); ?>" class="btn btn-primary btn-sm">View Syllabus</a>
                                        </div> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
              
            </div>
        </div>
    </div>
</main>
    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>