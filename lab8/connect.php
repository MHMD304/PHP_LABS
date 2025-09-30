<?php
session_start();

// Include necessary functions
// This assumes the functions are in a separate file
// Alternatively, you can include them directly here
require_once('functions.php');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? trim($_POST['id']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    
    // Validate credentials
    $usersData = fich2Tab("users.txt");
    
    if (isset($usersData[$id]) && $usersData[$id]['password'] == $password) {
        // Authentication successful
        $_SESSION['user_id'] = $id;
        header("Location: profile.php");
        exit();
    } else {
        // Authentication failed
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        .error-container {
            border: 1px solid #f44336;
            padding: 20px;
            border-radius: 5px;
            color: #f44336;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h2>Login Failed</h2>
        <p><?php echo isset($error) ? htmlspecialchars($error) : 'An error occurred'; ?></p>
        <p><a href="connect.html">Try again</a></p>
    </div>
</body>
</html>