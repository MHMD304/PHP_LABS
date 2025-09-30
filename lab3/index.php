<?php
    if(isset($_POST["send"]))
    {
        $message=trim($_POST["textarea"])."\n";
        if(!empty($message))
        {
        $f=fopen("messages.txt","a");
        fwrite($f, $message);
        fclose($f);
        $feedback='<p style="color:green;">message succesfully sent.</p>';
        }
        else
        $feedback='<p style="color:green;">message can\'t be empty.</p>';
    }
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Write messages</title>
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
        textarea{
            width: 300px;
            height: 200px;
        }
    </style> 
    </head>
<body>
    <center>
    <img src="logo.jpeg" alt="Logo">
    <h2>Science department</h2>
    <a href="see.php">Read messages</a>
    <p>Make your message fruitful</p>
    <?php
    
        if (isset($feedback)) {
            echo $feedback;
        }
        ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <textarea  name="textarea"  required></textarea>
    <br>
    <input  type="submit" name="send" value="send">
    </form>
    </center>
</body>
</html>