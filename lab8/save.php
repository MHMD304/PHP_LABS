<?php
session_start();

// Include necessary functions
require_once('functions.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: connect.html");
    exit();
}

$userId = $_SESSION['user_id'];
$message = "";
$success = false;

// Process status update
if (isset($_POST['status'])) {
    $newStatus = trim($_POST['status']);
    
    // Get current user data
    $usersData = fich2Tab("users.txt");
    
    if (isset($usersData[$userId])) {
        // Update status
        $usersData[$userId]['status'] = $newStatus;
        
        // Save updated data
        if (tab2Fich($usersData, "users.txt")) {  // Fixed function call syntax
            $message .= "Status successfully updated. ";
            $success = true;
        } else {
            $message .= "Failed to update status. ";
        }
    } else {
        $message .= "User not found. ";
    }
}

// Process photo upload
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    // Check file type
    $allowed_types = array('image/jpeg', 'image/jpg');
    if (!in_array($_FILES['photo']['type'], $allowed_types)) {
        $message .= "Only JPEG/JPG images are allowed. ";
    } 
    // Check file size (2MB = 2 * 1024 * 1024 = 2097152 bytes)
    elseif ($_FILES['photo']['size'] > 2097152) {
        $message .= "Image size must not exceed 2MB. ";
    } 
    // All checks passed, save the file
    else {
        $photoPath = "pics/" . $userId . ".jpg";
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)) {
            $message .= "Profile picture successfully changed. ";
            $success = true;
        } else {
            $message .= "Failed to upload profile picture. ";
        }
    }
}

// If no file was uploaded but status was changed successfully
if (!isset($_FILES['photo']) || $_FILES['photo']['error'] != 0) {
    if ($success) {
        $message = "Profile & status successfully changed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Save Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .message-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .nav-links {
            margin-top: 20px;
        }
        .nav-links a {
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2>Profile Update</h2>
        
        <div class="<?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
        
        <div class="nav-links">
            <a href="profile.php">View profile</a>
            <a href="change.php">Change profile</a>
        </div>
    </div>
</body>
</html>
