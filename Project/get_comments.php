<?php
include 'config.php';

$workout_id = $_GET['workout_id'];

$sql = "SELECT * FROM comments WHERE workout_id = $workout_id ORDER BY timestamp DESC";
$result = $conn->query($sql);

$comments = array();
while($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);

$conn->close();
?>
