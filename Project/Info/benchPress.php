<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Body Exercise Utilizing Chest Muscles</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            font-size: 20px;
        }

        img {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1 {
            font-size: 40px;
            color: black;
        }

        h2 {
            font-size: 40px;
            color: red;
        }

        p {
            font-size: 30px;
            line-height: 1.6;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .container>div {
            flex: 0 0 40%;
            padding: 10px;
            margin: 0 10px 20px 0;
        }

        .back-button {
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #009688;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .heart-button {
            font-size: 24px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: red;
        }

        .heart-count {
            font-size: 24px;
            margin-top: 10px;
        }

        .comment-section {
            margin-top: 20px;
        }

        .comment-input {
            width: 100%;
            height: 50px;
            margin-bottom: 10px;
        }

        .comment-list {
            margin-top: 10px;
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <p><img src="../workoutsImage/benchPress2.png"></p>
        </div>
        <div>
            <h1>Full Body Exercise Utilizing Chest Muscles</h1>
            <h2>Muscles Used:</h2>
            <ul>
                <li>Pectoralis Major (Chest)</li>
                <li>Deltoids (Shoulders)</li>
                <li>Triceps Brachii (Upper Arms)</li>
                <li>Core Muscles</li>
            </ul>
            <h2>Exercise Technique:</h2>
            <ol>
                <li>Keep forearms perpendicular to the ground throughout the exercise.</li>
                <li>When lowering and pushing the bar, maintain its position between the clavicles and sternum.</li>
                <li>During the lowering motion, slightly towards the clavicles, and during the pushing motion, towards the sternum.</li>
                <li>Ensure shoulders do not rise during the movement.</li>
                <li>Keep a slight arch in the lower back to maintain thoracic spine extension.</li>
            </ol>
            <p>Exercises like the Bench Press can be varied with incline or decline angles and by using different types of bars such as barbell or dumbbell Bench Press.</p>
        </div>
        <div>
            <button class="heart-button" onclick="toggleLike()">❤️ Like</button>
        </div>
        <div class="heart-count" id="likeCount">0 Likes</div>
        <div class="comment-section">
            <textarea class="comment-input" id="commentInput" placeholder="Write a comment..."></textarea>
            <button onclick="postComment()">Post Comment</button>
            <div class="comment-list" id="commentsList"></div>
        </div>
    </div>
    <button class="back-button" onclick="window.location.href = '../workouts.php'">Back to Workouts</button>

    <script>
        const workoutId = 1; // Unique ID for this workout
        let liked = false; // Initially not liked

        function toggleLike() {
            liked = !liked; // Toggle like state
            fetch('../toggle_like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `workout_id=${workoutId}&like=${liked}`
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("likeCount").innerHTML = data + " Likes";
            });
        }

        // Initial load to get the current likes and comments
        document.addEventListener('DOMContentLoaded', (event) => {
            fetch(`../get_post.php?post_id=${workoutId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('likeCount').innerHTML = data.likes + " Likes";
                });

            fetch(`../get_comments.php?workout_id=${workoutId}`)
                .then(response => response.json())
                .then(data => {
                    const commentsList = document.getElementById('commentsList');
                    commentsList.innerHTML = '';
                    data.forEach(comment => {
                        const commentElement = document.createElement('div');
                        commentElement.classList.add('comment');
                        commentElement.innerText = comment.content;
                        commentsList.appendChild(commentElement);
                    });
                });
        });

        function postComment() {
            const commentInput = document.getElementById('commentInput');
            const commentText = commentInput.value.trim();

            if (commentText) {
                fetch('../add_comment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `workout_id=${workoutId}&content=${commentText}`
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'Success') {
                        const commentsList = document.getElementById('commentsList');
                        const commentElement = document.createElement('div');
                        commentElement.classList.add('comment');
                        commentElement.innerText = commentText;
                        commentsList.prepend(commentElement);
                        commentInput.value = '';
                    } else {
                        alert('Error posting comment');
                    }
                });
            }
        }
    </script>
</body>

</html>
