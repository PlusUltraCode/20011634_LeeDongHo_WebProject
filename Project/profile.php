<?php
session_start();
include('config.php'); // Database connection

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$query = "SELECT * FROM user WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // If the user does not exist, end the session and redirect to the login page
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    if ($password) {
        $update_query = "UPDATE user SET username = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param('sssi', $username, $email, $password, $user_id);
    } else {
        $update_query = "UPDATE user SET username = ?, email = ? WHERE user_id = ?";
        $stmt->prepare($update_query);
        $stmt->bind_param('ssi', $username, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $success = "Profile updated successfully.";
    } else {
        $error = "Error updating profile: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        section {
            margin: 20px;
            font-size: 20px;
        }
        section h2 {
            font-size: 50px;
        }
        section div {
            margin-top: 20px;
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
                <li><a href="login.php">Login/Register</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Profile</h2>
        <?php if (isset($success)): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php elseif (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="profile.php">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div>
                <label for="password">New Password (leave blank to keep current password):</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Update Profile</button>
        </form>
        <a href="logout.php">Logout</a>
    </section>
    <footer>
        <p>&copy; 2024 Big Three Fitness. All rights reserved.</p>
    </footer>
</body>
</html>
