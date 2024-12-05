<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">

    <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
        <h1 class="h2 text-center mx-auto">Admin Dashboard</h1>
    </div>

     <!-- Responsive Row -->
     <div class="row g-4">
            <!-- Table Column -->
            <div class="col-12 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>User Count</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($departments as $dept): ?>
                                <tr>
                                    <td><?= esc($dept['name']) ?></td>
                                    <td><?= esc($dept['count']) ?></td>
                                    <td><?= esc($dept['percentage']) ?>%</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Chart Column -->
            <div class="col-12 col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:100%; width:100%">
                            <canvas id="departmentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="card mb-4 mt-4">
        <div class="card-header text-white" style="background-color:gray">
            <h4>Admin Task List</h4>
        </div>



        <div class="card-body">

            <h5 class="mt-4">1. Admin Tasks</h5>
            <p><i>(Normal Admins have restricted access but can manage the day-to-day operations of the portal.)</i></p>
            <ul>
                <li><strong>Students Management</strong>
                    <ul>
                        <li>Add, update, or delete student profiles.</li>
                        <li>Monitor student attendance and academic performance.</li>
                    </ul>
                </li>
                <li><strong>Courses Management</strong>
                    <ul>
                        <li>Add, update, or delete course details.</li>
                        <li>Assign students to courses.</li>
                        <li>Manage course schedules and materials.</li>
                    </ul>
                </li>
                <li><strong>Reports and Analytics</strong>
                    <ul>
                        <li>View reports on student or course performance.</li>
                    </ul>
                </li>
            </ul>

            <h5>2. Super Admin Tasks</h5>
            <p><i>(Super Admins have full access to all features, including those restricted from normal admins.)</i>
            </p>
            <ul>
                <li><strong>Administrators Management</strong>
                    <ul>
                        <li>Add, edit, or remove administrator accounts.</li>
                        <li>Assign roles and permissions to admins.</li>
                    </ul>
                </li>
                <li><strong>Settings</strong>
                    <ul>
                        <li>All the settings related to the dashboard can be adjusted.</li>
                    </ul>
                </li>

            </ul>


        </div>
    </div>


    <script>
        // Prepare data for Chart.js
        const departmentNames = <?= json_encode(array_column($departments, 'name')) ?>;
        const departmentPercentages = <?= json_encode(array_column($departments, 'percentage')) ?>;
        
        // Colors for pie chart
        const colors = [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)'
        ];

        // Create Pie Chart
        const ctx = document.getElementById('departmentChart').getContext('2d');
        const departmentChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: departmentNames,
                datasets: [{
                    data: departmentPercentages,
                    backgroundColor: colors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth: 20,
                            font: {
                                size: 12
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Department Distribution',
                        font: {
                            size: 16
                        }
                    }
                }
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</main>
</body>

    </html>