<?php
session_start();
include('config.php'); // Database connection



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diets</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>

    <style>
        .diet-plans {
            margin: 20px;
            float: left;
            display: flex;
            flex-direction: row;
        }

        .diet-plan {
            float: center;
            flex: 1;
            margin-right: 20px;
        }

        .diet-plan h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .diet-plan h2 {
            color: blue;
        }

        .diet-plan ul {
            list-style-type: none;
            padding: 0;
        }

        .diet-plan ul li {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .diet-plan+.diet-plan {
            margin-top: 20px;
        }

        main {
            margin-bottom:50px; 
        }


        footer {
            margin-top: 20px;
            background-color: #333;
            /* 배경색 설정 */
            color: #fff;
            /* 텍스트 색상 설정 */
            padding: 10px 0;
            /* 위아래 여백 설정 */
            text-align: center;
            /* 텍스트 가운데 정렬 */
            position: fixed;
            /* 페이지 하단에 고정 */
            left: 0;
            bottom: 0;
            width: 100%;
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
    <section>

        <main>


            <div class="diet-plans">
                <div class="diet-plan">
                    <h1 style="color:red">Male Bulking Diet</h1>
                    <h2>Breakfast:</h2>
                    <ul>
                        <li>100g Chicken Breast (with salt), 200g Brown Rice (or Mixed Grain Rice), Salad, 3 Almonds, Probiotic Product</li>
                    </ul>

                    <h2>Morning Snack:</h2>
                    <ul>
                        <li>2 Eggs, Salad</li>
                    </ul>

                    <h2>Lunch:</h2>
                    <ul>
                        <li>100g Chicken Breast, 250g Brown Rice, Salad</li>
                    </ul>

                    <h2>Afternoon Snack:</h2>
                    <ul>
                        <li>100g Chicken Breast, Salad, 50g Oatmeal</li>
                    </ul>

                    <h2>Dinner:</h2>
                    <ul>
                        <li>100g Turkey Breast, 250g Brown Rice, Salad</li>
                    </ul>
                </div>
            </div>


            <div class="diet-plan">
                <h1 style="color:red">Diet Plan for Weight Loss</h1>
                <h2>Breakfast:</h2>
                <ul>
                    <li>100g Chicken Breast, 60g Oatmeal, Salad</li>
                </ul>

                <h2>Morning Snack:</h2>
                <ul>
                    <li>1 Egg</li>
                </ul>

                <h2>Lunch:</h2>
                <ul>
                    <li>100g Chicken Breast, 180g Brown Rice, Salad</li>
                </ul>

                <h2>Afternoon Snack:</h2>
                <ul>
                    <li>Cherry Tomatoes</li>
                </ul>

                <h2>Dinner:</h2>
                <ul>
                    <li>100g Chicken Breast, 180g Brown Rice, Salad</li>
                </ul>
            </div>

        </main>


        <div style="margin:30px; margin-top:100px; margin-bottom:100px;">
            <h1 style="color:red;">How much protein should I eat?</h1>
            <p style="font-size:30px;">Height:
                <input type="number" id="heights">
                <button onclick="protein()">Push</button>
            <p id="result" style="font-size:30px;"></p>

            </p>
            <script>
                function protein() {
                    var pr = document.getElementById("heights").value;
                    var re = (pr * 1.2);

                    document.getElementById("result").innerHTML = "You have to eat " + re + "g protein";
                }
            </script>

        </div>

    </section>
    <footer>
        <p>&copy; 2024 Big Three Fitness. All rights reserved.</p>
    </footer>

</body>

</html>