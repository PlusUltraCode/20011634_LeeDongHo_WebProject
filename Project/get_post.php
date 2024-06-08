<?php
include 'config.php';

$post_id = $_GET['post_id'];

$sql = "SELECT * FROM workouts WHERE id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    echo json_encode($post);
} else {
    echo "No post found";
}

$conn->close();
?>
