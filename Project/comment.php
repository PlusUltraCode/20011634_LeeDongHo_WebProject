<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];
$content_id = $_POST['content_id'];
$content_type = $_POST['content_type'];
$comment = $_POST['comment'];

$query = "INSERT INTO comments (user_id, content_id, content_type, comment) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iiss", $user_id, $content_id, $content_type, $comment);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to comment']);
}
?>
