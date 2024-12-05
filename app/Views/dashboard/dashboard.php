<?= view('dashboard/vertical_navigation') ?>

<main class="main-content px-3 px-md-4">

    <div class="d-flex align-items-center border-bottom pt-3 pb-2 mb-3">
        <h1 class="h2 text-center mx-auto">Admin Dashboard</h1>
    </div>


    <div class="card mb-4 mt-4">
        <div class="card-header text-white" style="background-color:gray">
            <h4>Istructions for Administrators</h4>
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


 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</main>
</body>

    </html>