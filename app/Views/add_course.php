<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD Course</title>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: rgb(230, 221, 221);
    }
    .header {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .text {
        font-size: 1em;
        margin-right: 100px;
    }
    .logo {
        margin-left: 20px;
    }
    .nav {
        display: flex;
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
        text-decoration: none;
        font-size: 24px;
    }
    .container {
        background-color: white;
        padding: 20px;
        padding-right: 30px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 50%;
        margin-left: 25%;
        margin-top: 3%;
    }
    .container h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    .container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .container input, .container select, .container textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .container button {
        width: 25%;
        margin-left: 37.5%;
        font-size: 1.5em;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
    .container button:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.jpg" alt="University Logo" width="100px">
        </div>
        <div class="text">
            <h2>Sabaragamuwa University of Srilanka<br>Student Management Portal</h2>
        </div>
    </div>
    <br>
    <nav class="nav">
        <ul>
            <li class="Notification"> <a href="#notification" class="icon" title="Notifications"><img src="bell.png " alt="" width="27px"></a></li>
        </ul>
        <ul>
            <li><a href="#settings" class="icon" title="Profile"><img src="setting.png" alt="" width="27px"></a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Add Course</h1>
        <form action="course/add" method="post">
            <label for="courseName">Course Name</label>
            <input type="text" id="courseName" name="courseName">
            
            <label for="courseCode">Course Code</label>
            <input type="text" id="courseCode" name="courseCode">
            
            <label for="credits">Credits</label>
            <input type="number" id="credits" name="credits">
            
            <label for="department">Department</label>
            <select id="department" name="department">
                <option value="1">Department of Computing and Information Systems</option>
                <option value="2">Department of Software Engineering</option>
                <option value="3">Department of Data Science</option>
            </select>
            
            <label for="instructor">Instructor</label>
            <input type="text" id="instructor" name="instructor">
            
            <label for="courseDescription">Course Description</label>
            <textarea id="courseDescription" name="courseDescription" rows="4"></textarea>
            
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>

