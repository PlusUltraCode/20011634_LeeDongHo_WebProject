<?php
session_start();
include('config.php'); // Database connection


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workouts</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
    <style>
        h2 {
            font-size: 50px;
        }

        section {
            font-size: 20px;
            margin-bottom:50px;
        }

        .image-container {
            display: flex;
            /* Flexbox 사용 */
            justify-content: space-between;
            /* 이미지 사이 간격을 동일하게 배치 */
            align-items: center;
            /* 이미지를 세로 중앙 정렬 */
            margin-top: 20px;
            /* 위쪽 여백 추가 */
            border: 2px solid black;
            /* 테두리 추가 */
        }

        /* 이미지 설명 스타일 */
        .image-container figcaption {
            text-align: center;
            /* 이미지 설명 가운데 정렬 */

        }

        /* 이미지 사이즈 조절 */
        .image-container img {
            max-width: 100%;
            /* 이미지가 너무 커지지 않도록 최대 너비 제한 */
            height: auto;
            /* 비율을 유지하면서 이미지 높이 자동 조절 */
            border: 2px solid black;
            /* 테두리 추가 */

        }

        .image-container button {
            
            padding: 10px 20px; /* 버튼의 안쪽 여백 설정 */
            font-size: 16px; /* 버튼의 글꼴 크기 설정 */
            background-color: green;
            color:white;
            float:right;
        }

        footer {
            margin-top:20px;
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
    <main>

        <section>
            <h2>What Are the Big Three Exercises?</h2>
            <p>When we talk about the "Big Three" exercises, we are referring to:</p>
            <ul>
                <li>Bench Press</li>
                <li>Squat</li>
                <li>Deadlift</li>
            </ul>
            <p>These three exercises have the great advantage of utilizing all the muscles in our body. For fitness beginners, just consistently performing these three exercises can naturally stimulate even the small muscles, leading to muscle development!</p>
            <p>Now, let's get into the details of the Big Three exercises.</p>
        </section>
        <section class="image-container">
            <figure>
                <img src="workoutsImage/benchPress.png" alt="Bench Press">
                <figcaption>Bench Press</figcaption>
                <button onclick="window.location.href = 'Info/benchPress.php'">Details</button>
            </figure>
            <figure>
                <img src="workoutsImage/squartImage.png" alt="Squat">
                <figcaption>Squat</figcaption>
                <button onclick="window.location.href = 'Info/squat.php'">Details</button>
            </figure>
            <figure>
                <img src="workoutsImage/deadlift.png" alt="Deadlift">
                <figcaption>Deadlift</figcaption>
                <button onclick="window.location.href = 'Info/deadlift.php'">Details</button>
            </figure>
        </section>

    </main>
    <footer>
        <p>&copy; 2024 Big Three Fitness. All rights reserved.</p>
    </footer>
</body>

</html>