<?php
session_start();
require "functions.php";
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: connect.html");
    exit();
}

$userId = $_SESSION['user_id'];

// Get user data
$usersData = fich2Tab("users.txt");
if (!isset($usersData[$userId])) {
    echo "User not found";
    exit();
}

$userStatus = $usersData[$userId]['status'];
$photoPath = "pics/" . $userId . ".jpg";

// Check if photo exists, use a default if not
if (!file_exists($photoPath)) {
    $photoPath = "pics/default.jpg";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .profile-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        .profile-photo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        .profile-status {
            margin-bottom: 20px;
        }
        .profile-links {
            margin-top: 20px;
        }
        .profile-links a {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>My Profile</h2>
        
        <div class="profile-photo">
            <img src="<?php echo htmlspecialchars($photoPath); ?>" alt="Profile Picture" style="max-width: 100%;">
        </div>
        
        <div class="profile-status">
            <strong>My status:</strong> <?php echo htmlspecialchars($userStatus); ?>
        </div>
        
        <div class="profile-links">
            <a href="change.php">Change profile</a>
        </div>
    </div>
</body>
</html>