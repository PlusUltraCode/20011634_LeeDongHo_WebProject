<?php
    session_start();
    include('config.php');
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness and Health</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        section{
            display:flex;
            flex-wrap : wrap;
            width:80%;
        }
        
        section div{
            font-size:30px;
            flex :10;
           
        }
        
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="workouts.php">Workouts</a></li>
                <li><a href="diets.php">Diets</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="login.php">Log In/Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <div style="margin-left:100px;">
                <img src="workoutsImage/GYM.png">
            </div>
            <div>
            <h1 style="color:brown">Welcome to our Health Information Website</h1>
            <p>Take your time to explore and gather valuable information for your health and fitness journey. Enjoy!</p>
            <p style="color:blueviolet"><br>20011634 LeeDongHo in SejongUniversity</p>
        
        </div>
        </section>
    </main>
    <footer>
        <p>Contact us at info@fitnesshealth.com</p>
        <p>Follow us on social media</p>
    </footer>
</body>
</html>
