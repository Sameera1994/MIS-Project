<?= view('dashboard/vertical_navigation') ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registration Form</h1>

    </div>
    <form action="<?= base_url('dashboard/admins/store_admin') ?>" method="post">
        <?= csrf_field() ?>
        <!-- CSRF protection -->

        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?= old('name') ?>">
        </div>

        <!-- <div class="form-group mb-3">
            <select name="department" class="form-select">
                <option value="" disabled selected>Select Department</option>
                <option value="Computing and Information Systems">Computing and Information Systems
                </option>
                <option value="Sofware Engineering">Software Engineering</option>
                <option value="Data Science">Data Science</option>
            </select>
        </div> -->

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
        </div>

        <div class="form-group mb-3">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" name="telephone" value="<?= old('telephone') ?>">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group mb-3">
            <label for="access_level">Access Level:</label>
            <input type="text" class="form-control" name="access_level" value="<?= old('access_level') ?>">
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