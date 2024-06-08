<?php
include 'config.php';

$workout_id = $_POST['workout_id'];
$like = $_POST['like']; // true: like, false: unlike

if ($like === 'true') {
    $sql = "UPDATE workouts SET likes = likes + 1 WHERE id = $workout_id";
} else {
    $sql = "UPDATE workouts SET likes = likes - 1 WHERE id = $workout_id";
}

if ($conn->query($sql) === TRUE) {
    $result = $conn->query("SELECT likes FROM workouts WHERE id = $workout_id");
    $row = $result->fetch_assoc();
    echo $row['likes'];
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
