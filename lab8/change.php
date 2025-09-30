<?php
session_start();
require"functions.php";
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
    <title>Change Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .button {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .current-photo {
            max-width: 150px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Change Your Profile</h2>
        
        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Current Photo:</label>
                <div class="current-photo">
                    <img src="<?php echo htmlspecialchars($photoPath); ?>" alt="Current Profile Picture" style="max-width: 100%;">
                </div>
                
                <label for="photo">New Photo:</label>
                <input type="file" id="photo" name="photo">
            </div>
            
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($userStatus); ?>" style="width: 100%;">
            </div>
            
            <div class="form-group">
                <button type="submit" class="button">OK</button>
            </div>
        </form>
        
        <div style="margin-top: 20px;">
            <a href="profile.php">View profile</a>
        </div>
    </div>
</body>
</html>