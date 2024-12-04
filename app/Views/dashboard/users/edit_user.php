<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>

   <form action="<?= base_url('users/update/' . $user['uid']) ?>" method="post">
    <?= csrf_field() ?> <!-- CSRF protection -->

    <div class="form-group mb-3">
        <label for="name">Name with Initials:</label>
        <input type="text" class="form-control" name="name" value="<?= old('name', $user['name']) ?>">
    </div>

    <div class="form-group mb-3">
        <label for="email">University Email:</label>
        <input type="email" class="form-control" name="email" value="<?= old('email', $user['email']) ?>">
    </div>

    <div class="form-group mb-3">
        <label for="username">Registration Number/Username:</label>
        <input type="text" class="form-control" name="username" value="<?= old('username', $user['username']) ?>">
    </div>

    <div class="form-group mb-3">
        <label for="username">Department:</label>
        <input type="text" class="form-control" name="department" value="<?= old('department', $user['department']) ?>">
    </div>

    <div class="form-group mb-3">
        <label for="password">New Password:</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group mb-3">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" class="form-control" name="confirmPassword">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


    <?php if (session()->has('errors')): ?>
        <div class="alert alert-danger mt-3">
            <?php foreach (session('errors') as $error): ?>
                <p><?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</main>

<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>

</body>
</html>
