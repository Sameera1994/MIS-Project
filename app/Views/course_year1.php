<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
   
}

body {
    margin: 0;
    font-family: Arial, sans-serif; /* Font family for the body */
}

header {
    background-color: #f2eeed; 
    padding: 10px 20px; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
}

.logo img {
    width: 100px; 
    height: auto; 
}

nav {
    background-color: transparent; 
}

nav ul {
    list-style-type: none; 
    padding: 0; 
    margin: 0; 
    display: flex; 
    align-items: center; 
}

nav ul li {
    margin: 0 20px; 
    position: relative; 
}

nav ul li a {
    text-decoration: none; 
    color: black; 
    font-size: 1.2em; 
    transition: color 0.3s ease; 
}
 nav ul li.active a {
            color: #e74c3c; 
            font-weight: bold; 
 }

nav ul li a:hover {
    
}

nav ul li::after {
    content: ""; 
    position: absolute; 
    left: 50%; 
    bottom: -5px; 
    width: 0; 
    height: 3px; 
    background-color: #e74c3c; 
    transition: width 0.3s ease, left 0.3s ease; 
}

nav ul li:hover::after {
    width: 100%; 
    left: 0; 
}

.icon {
    margin-left: 30px; 
    color: #ecf0f1; 
    font-size: 1.5em; 
    text-decoration: none; 
    transition: color 0.3s ease; 
}

.icon:hover {
    
    cursor: pointer; 
}
h1{
    text-align: center;
}
.container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}
.semester {
    width: 40%;
}
.semester h2 {
    text-align: center;
}
.course-list {
    list-style-type: none;
    padding: 0;
}
.course-list li {
    margin: 10px 0; /* Add space between links */
}
.course-list li a {
    text-decoration: none;
    color: #5b5a5f;
    font-size: 18px; /* Change link size */
}
.course-list li a:hover{
    color: #3ea741;
}

.course-list li a{
    text-decoration: none;
}
.end-session{
    position: fixed;
    bottom: 0;
    width: 100%;
}
footer {
    background-color:black;
    padding: 20px;
    text-align: center;
    display: flex;
    justify-content: space-around;
    
    color: white;
}
 
footer {
    display: flex;
    justify-content: space-between;
    background-color: #000000; /* Dark background color for the footer */
    color: #fff;
    padding: 20px;
    flex-wrap: wrap;
}

footer .contact, footer .about, footer .follow {
    flex: 1;
    padding: 20px;
    min-width: 250px; /* Ensures sections stack properly on smaller screens */
}

footer img {
    width: 20px;
    margin: 0 10px;
}

.contact p, .about p {
    text-align: left;
}

.copyright {
    text-align: center;
    color: #fff;
    background-color: #000;
    padding: 15px 0;
    width: 100%;
    margin-top: -20px;
    position: relative;
}

/* Responsive styling */
@media (max-width: 768px) {
    footer {
        flex-direction: column;
        align-items: center;
    }
}

    </style>
</head>
<body>
    
    <header>
        <div class="logo">
        <img src="logo.jpg" alt="University Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li class="active"><a href="#courses">Courses</a></li> 
                <li><a href="#contact">Contact</a></li>
                
                
                    <a href="#notification" class="icon" title="Notifications"><img src="bell.png" alt=" "width="30px"></a>
                
                
                    <a href="#profile" class="icon" title="Profile"><img src="profile-user.png" alt="" width="30px"></a>
                
            </ul>
        </nav>
    </header>
    <h1>Courses >year 1</h1>
    <div class="container">
        <div class="semester">
            <h2>Semester I</h2>
            <br>
            <ul class="course-list">
                <b><li><a href="#">Digital Innovation</a></li></b>
                <b><li><a href="#">Advanced Mathematics</a></li></b>
                <b><li><a href="#">C programming</a></li></b> 
                <b><li><a href="#">Computer System Organization</a></li></b>
                <b><li><a href="#">Information Systems</a></li></b>
                <b><li><a href="#">English</a></li></b>
                <b><li><a href="#">Academic Integrity</a></li></b>
                <b><li><a href="#">Communication Skills</a></li></b>
            </ul>
        </div>
        <div class="semester">
            <h2>Semester 2</h2>
            <br>
            <ul class="course-list">
                <b><li><a href="#">Digital Innovation</a></li></b>
                <b><li><a href="#">Advanced Mathematics</a></li></b>
                <b><li><a href="#">C programming</a></li></b> 
                <b><li><a href="#">Computer System Organization</a></li></b>
                <b><li><a href="#">Information Systems</a></li></b>
                <b><li><a href="#">English</a></li></b>
                <b><li><a href="#">Academic Integrity</a></li></b>
                <b><li><a href="#">Communication Skills</a></li></b>
            </ul>
    </div>
    </div>
    <div class="end-session">
    <footer>
        <div class="contact">
            <h4>Contact Us</h4>
            <p>Sabaragamuwa University of Sri Lanka</p>
            <p>PO Box 02</p>
            <p>Pambahinna, Sri Lanka - 70140</p>
            <p>Tel - 0452280049</p>
            <p>Email - vleadmin@sab.ac.lk</p>
        </div>
        <div class="about">
            <h4>About Us</h4>
            <p>SUSL</p>
            <p>Graduate Studies</p>
            <p>CODL</p>
        </div>
        <div class="follow">
            <h4>Follow</h4>
            <img src="facebook.png" alt="Facebook">
            <img src="linkedin.png" alt="LinkedIn">
            <img src="youtube.png" alt="YouTube">
        </div>   
    </footer>
    <div class="copyright"><p>2024, All rights reserved by Sabaragamuwa University of Sri Lanka</p></div>
    </div>
    <script src="script.js"></script>
</body>
</html>
