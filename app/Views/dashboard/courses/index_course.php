<?= view('dashboard/vertical_navigation') ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Course Management</h1>

    </div>

    <div class="d-flex justify-content-between my-5">
        <div>
            <form action="<?= base_url('dashboard/search_user') ?>" method="get">
                <input type="text" name="query" class="form-control" placeholder="Search Users"
                    style="width: 200px; display: inline-block; margin-right: 10px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div>
            <a class="btn btn-success" href="<?= base_url('dashboard/create_user') ?>">Add New Student</a>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">UID</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Name
                </th>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Email
                </th>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">
                    Reg.No./Username</th>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Password
                </th>
                <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($user)): ?>
            <?php foreach ($user as $u): ?>
            <tr style="background-color: #fff;">
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;"><?= $u['uid'] ?></td>
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;"><?= $u['name'] ?></td>
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;"><?= $u['email'] ?></td>
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;"><?= $u['username'] ?></td>
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;"><?= $u['password'] ?></td>
                <td style="padding: 12px; text-align: left; border: 1px solid #ddd;">
                <a href="<?= base_url('dashboard/delete_user/' . $u['uid']) ?>">Delete</a>
                <a href="<?= base_url('dashboard/edit_user/' . $u['uid']) ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center; padding: 12px; border: 1px solid #ddd;">No users found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</main>
</div>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
</script>
<!-- <script src="dashboard.js"></script> -->
</body>

</html>