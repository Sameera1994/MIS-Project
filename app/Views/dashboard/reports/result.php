<?= view('dashboard/reports/reports_navigation') ?>

<div class="container mt-5">
    <h2 class="mb-4">Result Reports and Analytics</h2>
    
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

    <div id="resultTables" class="row">
        <!-- Results will be displayed here -->
    </div>

    <!-- Add a div for statistics -->
    <div id="statistics" class="row mt-4">
        <!-- Statistics will be displayed here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Previous code remains the same until the JavaScript section -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Helper function to determine status and badge color
    function getStatusBadge(result) {
        // Convert result to uppercase for consistent comparison
        result = result.toUpperCase().trim();
        
        // Define grade classifications with their corresponding badge colors
        const gradeCategories = {
            passed: ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+'],
            repeat: ['D', 'E'],
            medical: ['AB'],
            hold: ['HOLD'],
            sd: ['SD'],
            other: ['OTHER']
        };

        // Determine category and return appropriate badge
        if (gradeCategories.passed.includes(result)) {
            return '<span class="badge bg-success">Passed</span>';
        } else if (gradeCategories.repeat.includes(result)) {
            return '<span class="badge bg-danger">Repeat</span>';
        } else if (gradeCategories.medical.includes(result)) {
            return '<span class="badge bg-warning">Medical</span>';
        } else if (gradeCategories.hold.includes(result)) {
            return '<span class="badge bg-secondary">Hold</span>';
        } else if (gradeCategories.sd.includes(result)) {
            return '<span class="badge bg-info">SD</span>';
        } else {
            return '<span class="badge bg-dark">Other</span>';
        }
    }

    $('#showBtn').click(function() {
        const department = $('#department').val();
        const batch = $('#batch').val();
        const semester = $('#semester').val();
        const subject = $('#subject').val();

        if (!department || !batch || !semester || !subject) {
            alert('Please select all fields');
            return;
        }

        // Show loading indicator
        $('#resultTables').html('<div class="col-12 text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>');

        $.ajax({
            url: '<?= base_url('result/getResultData') ?>',
            method: 'POST',
            data: {
                department: department,
                batch: batch,
                semester: semester,
                subject: subject
            },
            success: function(response) {
                const resultData = response.resultData;
                
                // Calculate statistics
                const totalStudents = resultData.length;
                const passedStudents = resultData.filter(r => {
                    const grade = r.result.toUpperCase().trim();
                    return ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+'].includes(grade);
                }).length;
                const passPercentage = totalStudents > 0 ? ((passedStudents / totalStudents) * 100).toFixed(2) : 0;
                
                // Generate HTML for results table
                let tableHtml = `
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Results for ${department} - ${batch} - Semester ${semester} - ${subject}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Student Username</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                `;
                
                resultData.forEach(record => {
                    tableHtml += `
                        <tr>
                            <td>${record.student_username}</td>
                            <td>${record.result}</td>
                            <td>${getStatusBadge(record.result)}</td>
                        </tr>
                    `;
                });
                
                tableHtml += `
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                `;

                // Generate HTML for statistics
                let statsHtml = `
                    <div class="col-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="card-title">Statistics</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            Total Students: ${totalStudents}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-success">
                                            Pass Rate: ${passPercentage}% (${passedStudents} out of ${totalStudents})
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Update the DOM
                $('#resultTables').html(tableHtml);
                $('#statistics').html(statsHtml);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $('#resultTables').html('<div class="col-12"><div class="alert alert-danger">Error fetching result data</div></div>');
                $('#statistics').empty();
            }
        });
    });
});
</script>
</body>
</html>