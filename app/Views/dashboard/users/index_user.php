<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">
        <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
            <h1 class="h2 text-center mx-auto">Student Management</h1>
        </div>

        <div class="d-flex justify-content-between my-4 search-add-container">
            <div class="search-container">
                <form action="<?= base_url('users/search') ?>" method="get">
                    <div class="form-control border-0">
                        <input type="text" name="query" class="rounded border border-secondary-subtle p-1" placeholder="Search Students">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= base_url('users/create') ?>">Add New Student</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Reg.No./Username</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($user)): ?>
                        <?php foreach ($user as $u): ?>
                            <tr>
                                <td data-label="Reg.No./Username"><?= $u['username'] ?></td>
                                <td data-label="Department"><?= $u['department'] ?></td>
                                <td data-label="Name"><?= $u['name'] ?></td>
                                <td data-label="Email"><?= $u['email'] ?></td>
                                <td data-label="Action">
                                    <div class="d-flex gap-2">
                                        <a href="<?= base_url('users/edit/' . $u['uid']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="<?= base_url('users/delete/' . $u['uid']) ?>" class="btn btn-sm btn-danger">Delete</a>
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