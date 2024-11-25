<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management</title>
    
    <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this course?')) {
            document.getElementById('deleteForm_' + id).submit(); // Submit the form
        }
    }
    </script>


    <style>
 
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: rgb(230, 221, 221);
    
}
.header{
    display: flex;
    justify-content: center;
    align-items: center;
}
.text{
   font-size: 1em;
   margin-right: 100px;
   margin-left: 10%;
   
}
.logo{
    margin-left: 20px;
}
.nav {
    display: flex; /* Use flexbox to align items */
    justify-content: flex-end; 
}

.nav ul {
    list-style-type: none; 
    margin: 10px; 
    padding: 0; 
}

.nav li {
    display: inline-block; 
    margin-left: 15px; 
    margin-right: 20px;

}

.nav .icon {
    text-decoration: none; /* Remove underline from links */
    font-size: 24px; /* Adjust icon size */
}
.container {
            width: 60%;
            height: 60%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 25%;
            left: 20%;
            overflow:auto;
           
            
        h2{
            text-align: center;
        }    
        }
        
            
        
        .header1 {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .header1 input {
            width: 250px;
            padding: 5px;
            margin: 5px;
            
        }
        .header1 button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
        }
        .header1 button:hover {
            background-color: #45a049;
        }
        .add-course {
            margin-bottom: 20px;
        }
        .add-course button {
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
            width: 200px;
        }
        .add-course button:hover {
            background-color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            overflow:auto;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .status-dropdown {
            padding: 5px;
            border-radius: 10px;
            border: 1px solid rgb(72, 72, 160);
        }
        .action-icons {
            display: flex;
            gap: 20px;
        }
        .action-icons i {
            cursor: pointer;
        }
    @media (max-width:520px) {
        .nav li {
        display: inline-block; 
        
        position: relative;
        bottom: 40px;
        }
        }
        @media (max-height:900px) {
        .nav li {
        display: inline-block; 
        
        position: relative;
        bottom: 80px;
        }
        .container{
        
            width: 60%;
            height: 60%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 30%;
            left: 20%;
        }
       
    }<img src="<?= base_url('assets/recycle-bin.png') ?>" alt="" width="20px">

    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.jpg" alt="University Logo" width="100px">
        </div>
        <div class="text">
            <h2>Sabaragamuwa University of Srilanka<br>
                Student Management Portal</h2>
        </div>
    </div>
    <br>
    <nav class="nav">
        <ul>
            <li class="Notification"> <a href="#notification" class="icon" title="Notifications"><img src="bell.png" alt="" width="27px"></a></li></ul>
           <ul><li><a href="#settings" class="icon" title="Profile"><img src="setting.png" alt="" width="27px"></a></li>  </ul>   
            
        
    </nav>
    
    <div class="container">
        <h2>Course Management</h2>
        <div class="header1">
        <form action="<?= site_url('search_courses') ?>" method="get">
            <input type="text" name="course_code" placeholder="Input Course Code...">
            <button type="submit">Search</button>
        </form>
        </div>
        <div class="add-course">
           <a href="add_course"><button>+ Add Course</button></a> 
        </div>
        
         <table>
            <thead>
                <tr>
                    <th>Course Details</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach ($courses as $course): ?>
                    <td><?= $course['course_code'] ?></td>
                    <td>
                        <select class="status-dropdown">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </td>
                    <td class="action-icons">
                        <!-- Delete icon with a form -->
                        <form id="deleteForm_<?= $course['id'] ?>" method="post" action="/delete_course">
                            <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
                            <i class="delete-icon" onclick="confirmDelete(<?= $course['id'] ?>)">
                                <img src="recycle-bin.png" alt="Delete" width="20px">
                            </i>
                        </form>
                        <!-- Edit icon (you can implement edit functionality similarly) -->
                        <i class="edit-icon">
                            <a href="/edit_course/<?= $course['id'] ?>">
                                <img src="draw.png" alt="Edit" width="20px">
                            </a>
                        </i>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        </div>
        
    </div>
</body>    
</html>