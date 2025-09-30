<?php
$USERNAME = "Soliman";
$PASSWORD = "1234";
$messages = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitButton"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === $USERNAME && $password === $PASSWORD) {
        // Open the file and read messages
        if (file_exists("messages.txt")) {
            $f = fopen("messages.txt", "r");
            while (($message = fgets($f)) !== false) {
                $messages .= htmlspecialchars($message) . "<br>"; // Prevent XSS
            }
            fclose($f);
        } else {
            $messages = "No messages found.";
        }
    } else {
        header("location:index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form input {
            padding: 10px;
            font-size: 16px;
            width: 200px;
        }
        p {
            color: black;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <center>
        <img src="logo.jpeg" alt="Logo">
        <h2>Science Department</h2>
        <a href="index.php">Send a Message</a>
        <br><br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input  
                type="text" 
                name="username" 
                id="username" 
                required 
                placeholder="Enter your username">   
            <br><br>
            <input 
                type="password" 
                name="password" 
                id="password" 
                required 
                placeholder="Enter your password">
            <br><br>
            <input 
                style="width: 200px;" 
                type="submit" 
                name="submitButton" 
                value="Read">
        </form>
        <?php if (!empty($messages)){ ?>
            <p><?php echo $messages; ?></p>
        <?php } ?>
    </center>
</body>
</html>
