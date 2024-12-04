<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Administrator Management</h1>
        </div>

        <div class="d-flex justify-content-between my-4 search-add-container">
            <div class="search-container">
                <form action="<?= base_url('admins/search') ?>" method="get">
                    <div class="form-control border-0">
                        <input type="text" name="query" class="rounded border border-secondary-subtle p-1" placeholder="Search Admin">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= base_url('admins/create') ?>">Add New Admin</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Access Level</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($admin)): ?>
                        <?php foreach ($admin as $a): ?>
                            <tr>
                                <td data-label="Reg.No./Username"><?= $a['access_level'] ?></td>
                                <td data-label="Department"><?= $a['name'] ?></td>
                                <td data-label="Name"><?= $a['email'] ?></td>
                                <td data-label="Email"><?= $a['telephone'] ?></td>
                                <td data-label="Action">
                                <div class="d-flex gap-2">
                                        <a href="<?= base_url('admins/edit/' . $a['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="<?= base_url('admins/delete/' . $a['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </div> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            
            sidebar.classList.toggle('show');
            
            if (sidebar.classList.contains('show')) {
                overlay.style.display = 'block';
            } else {
                overlay.style.display = 'none';
            }
        }
    </script>
</body>
</html>