<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    
     <style>
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
    background-color:#f2eeed; 
    padding: 5px 20px; 
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

main {
    padding: 20px;
}

.courses {
    text-align: center;
}

.year {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.year-item {
    text-align: center;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    flex: 1 0 300px;
    max-width: 250px;
    margin-bottom: 10px;
}

.year-item:hover {
    transform: scale(1.05);
}

.year-item img {
    width: 100%;
    height: auto;
    border-radius: 8px 8px 0 0;
}

.year-item h4 {
    margin: 10px 0;
    font-size: 1.2em; 
    font-weight: bold; 
    color: #333; 
    text-align: center; 
    padding: 10px; 
}

.year-item a {
    text-decoration: none; 
    color: inherit; 
}

@media (max-width: 768px) {
    .year {
        flex-direction: column;
        gap: 10px;
    }

    .year-item {
        max-width: 100%;
    }
}



footer {
    background-color:black;
    padding: 10px;
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
    padding: 10px;
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
    position: relative;
    bottom:1px;
    padding:10px;
    background-color: black;
    color: white;
    text-align:center;
   
    
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
                
                
                    <a href="#notification" class="icon" title="Notifications"><img src="bell.png" alt="" width=30px></a>
                
                
                    <a href="#profile" class="icon" title="Profile"><img src="profile-user.png" alt="" width=30px></a>
                
            </ul>
        </nav>
    </header>
    <main>
        <section class="courses">
            <h2>Courses</h2>
            <br>
            
            <div class="year">
                <div class="year-item">
                    <a href="course_year1">
                        <h4>Year 1</h4>
                        <img src="courses.png" alt="Year 1" >
                    </a>
                </div>
                <div class="year-item">
                    <a href="course_year2">
                        <h4>Year 2</h4>
                        <img src="courses.png" alt="Year 2" >
                    </a>
                </div>
                <div class="year-item">
                    <a href="course_year3">
                        <h4>Year 3</h4>
                        <img src="courses.png" alt="Year 3" >
                    </a>
                </div>
                <div class="year-item">
                    <a href="course_year4">
                        <h4>Year 4</h4>
                        <img src="courses.png" alt="Year 4" >
                    </a>
                </div>
            </div>
        </section>
        
        
    </main>
    <br>
    
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
            <a href=""><img src="facebook.png" alt="Facebook"><a>
            <a href=""><img src="linkedin.png" alt="LinkedIn"><a>
            <a href=""><img src="youtube.png" alt="YouTube"></a>
        </div>   
    </footer>
    <div class="copyright"><p>2024, All rights reserved by Sabaragamuwa University of Sri Lanka</p></div>
    </div>
    <script src="script.js"></script>
</body>
</html>
