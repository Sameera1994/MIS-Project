<?= view('dashboard/reports/reports_navigation') ?>
<div class="container mt-5 mb-5">
        <h2 class="mb-4">Attendance Reports and Analytics</h2>
        <div  class="row mb-4">
        <div class="col-md-6">
                <button id="" class="btn btn-success">Import</button>
            </div>
            <div class="col-md-6">
                <button id="" class="btn btn-success">Export</button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3">
                <select id="department" class="form-select">
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['department'] ?>"><?= $dept['department'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <select id="batch" class="form-select">
                    <option value="">Select Batch</option>
                    <?php foreach ($batches as $batch): ?>
                        <option value="<?= $batch['batch'] ?>"><?= $batch['batch'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <select id="semester" class="form-select">
                    <option value="">Select Semester</option>
                    <?php foreach ($semesters as $sem): ?>
                        <option value="<?= $sem['semester'] ?>"><?= $sem['semester'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="col-md-3">
                <select id="subject" class="form-select">
                    <option value="">Select Subject</option>
                    <?php foreach ($subjects as $subj): ?>
                        <option value="<?= $subj['subject'] ?>"><?= $subj['subject'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="col-md-1">
                <button id="showBtn" class="btn btn-primary">Show</button>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <input type="text" id="usernameFilter" class="form-control" placeholder="Filter by Username">
                    <button class="btn btn-secondary" id="filterBtn">Filter</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Attendance Statistics</h5>
                        <canvas id="attendanceChart"></canvas>
                        <div class="mt-3 text-center">
                            <span class="badge bg-success me-2">Present</span>
                            <span class="badge bg-danger">Absent</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="attendanceTables">
                    <!-- Tables will be dynamically populated here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let attendanceChart = null;

        function updateChart(percentageData) {
            if (attendanceChart) {
                attendanceChart.destroy();
            }

            const ctx = document.getElementById('attendanceChart').getContext('2d');
            attendanceChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Present', 'Absent'],
                    datasets: [{
                        data: [percentageData.present, percentageData.absent],
                        backgroundColor: ['#28a745', '#dc3545'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Attendance Statistics',
                            font: {
                                size: 16
                            }
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
        }

        function loadAttendanceData() {
            const department = $('#department').val();
            const batch = $('#batch').val();
            const semester = $('#semester').val();
            const subject = $('#subject').val();
            const username = $('#usernameFilter').val();

            if (!department || !batch || !semester || !subject) {
                alert('Please select all fields');
                return;
            }

            $.ajax({
                url: '<?= base_url('attendance/getAttendanceData') ?>',
                method: 'POST',
                data: {
                    department: department,
                    batch: batch,
                    semester: semester,
                    subject: subject,
                    username: username
                },
                success: function(response) {
                    // Update pie chart
                    updateChart(response.percentageData);

                    // Update attendance tables
                    $('#attendanceTables').empty();
                    
                    let filteredData = response.attendanceData;
                    if (username) {
                        filteredData = filteredData.filter(record => 
                            record.student_username.toLowerCase().includes(username.toLowerCase())
                        );
                    }

                    // Group attendance data by date
                    const dates = response.dates;
                    dates.forEach(date => {
                        const records = filteredData.filter(
                            record => record.lecture_date === date.lecture_date
                        );

                        if (records.length > 0) {
                            const tableHtml = `
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">Date: ${formatDate(date.lecture_date)}</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="ps-3">Username</th>
                                                    <th class="text-center">Attendance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ${records.map(record => `
                                                    <tr>
                                                        <td class="ps-3">${record.student_username}</td>
                                                        <td class="text-center">
                                                            <span class="badge ${parseInt(record.attendance) === 1 ? 'bg-success' : 'bg-danger'}">
                                                                ${parseInt(record.attendance) === 1 ? 'Present' : 'Absent'}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                `).join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            `;
                            $('#attendanceTables').append(tableHtml);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Error fetching attendance data');
                }
            });
        }

        $(document).ready(function() {
            $('#showBtn').click(loadAttendanceData);
            $('#filterBtn').click(loadAttendanceData);
            $('#usernameFilter').on('keypress', function(e) {
                if (e.which === 13) {
                    loadAttendanceData();
                }
            });
        });
    </script>
</body>
</html>