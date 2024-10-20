<?= view('dashboard/vertical_navigation') ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Management</h1>
        
      </div>

      <button  class="btn btn-success" href="">Add New User</button>

      <h2>Add Details</h2>
    <form>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" placeholder="Enter your age" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque sint eos odit quos error eligendi adipisci obcaecati quibusdam aut sapiente consectetur in voluptas deleniti fugiat, necessitatibus amet fugit quasi sit.</p>
    
    <table style="width: 100%; border-collapse: collapse;" >
    <thead>
        <tr>
            <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">UID</th>
            <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Username</th>
            <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Password</th>
            <th style="padding: 12px; text-align: left; border: 1px solid #ddd; background-color: #f2f2f2;">Action</th>
        </tr>
    </thead>
    <tbody>
    <tr style="background-color: #fff;">
            <td style="padding: 12px; text-align: left; border: 1px solid #ddd;">1</td>
            <td style="padding: 12px; text-align: left; border: 1px solid #ddd;">John Doe</td>
            <td style="padding: 12px; text-align: left; border: 1px solid #ddd;">28</td>
            <td style="padding: 12px; text-align: left; border: 1px solid #ddd;">New York</td>
        </tr>
    </tbody>
</table>

    </main>
  </div>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
