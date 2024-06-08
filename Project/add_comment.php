<?php
include 'config.php';

$workout_id = $_POST['workout_id'];
$content = $_POST['content'];

$sql = "INSERT INTO comments (workout_id, content) VALUES ($workout_id, '$content')";

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
