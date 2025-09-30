<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id']; 
}
?>

<html>
    <body>
        <h3>Change Profile Picture</h3>
        <form action="save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            <label for="profile_image">Choose a new profile picture:</label>
            <input type="file" name="profile_image" id="profile_image" required>
            <br><br>
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
</html>
