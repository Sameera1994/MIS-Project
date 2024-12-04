<?= view('dashboard/vertical_navigation') ?>


<main class="main-content px-3 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student Admission Form</h1>

    </div>
    <form action="<?= base_url('users/store') ?>" method="post">
        <?= csrf_field() ?>
        <!-- CSRF protection -->

        <div class="form-group mb-3">
            <label for="name">Name with Initials:</label>
            <input type="text" class="form-control" name="name" value="<?= old('name') ?>">
        </div>

        <div class="form-group mb-3">
            <label for="department">Department:</label>
            <select name="department" class="form-select">
                <option value="" disabled >Select Department</option>
                <option value="Computing and Information Systems" <?= old('department') === 'Computing and Information Systems' ? 'selected' : 'Computing and Information Systems' ?>>
                    Computing and Information Systems
                </option>
                <option value="Software Engineering" <?= old('department') === 'Software Engineering' ? 'selected' : 'Software Engineering' ?>>
                    Software Engineering
                </option>
                <option value="Data Science" <?= old('department') === 'Data Science' ? 'selected' : 'Data Science' ?>>
                    Data Science
                </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="email">University Email:</label>
            <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
        </div>

        <div class="form-group mb-3">
            <label for="username">Registration Number/Username:</label>
            <!-- Students can use their registration number and administrators can use admin. -->
            <input type="text" class="form-control" name="username" value="<?= old('username') ?>">
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
    <div>
        <?php foreach (session('errors') as $error): ?>
        <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</main>
</div>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
</script>
<script src="dashboard.js"></script>
</body>

</html>