<?php
if(isset($_POST['submit']))
{
    $file = $_FILES['fileToUpload']['tmp_name'];
   
    $imageSize = getimagesize($file);
    if ($imageSize === false) {
        echo "The file is not an image.<br>";
    } else {
        $size = $_FILES['fileToUpload']['size'];

    
        if ($size > 5 * 1024 * 1024) {
            echo "The image is too large!<br>";
        } else {
            $filename = $_FILES['fileToUpload']['name']; 
        
            $imageExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); 
            $allowedExtensions = ["jpg", "jpeg", "gif"];

            // Validate file extension
            if (!in_array($imageExt, $allowedExtensions)) {
                echo "Invalid file type. Allowed types: jpg, jpeg, gif.<br>";
            } else {
                $imagename = pathinfo($filename, PATHINFO_FILENAME); 
                $targetPath = "flowers/" . $filename;
                
                if (move_uploaded_file($file, $targetPath)) {
                    echo "Image uploaded successfully!<br>";
                } else {
                    echo "Failed to upload the image.<br>";
                }
            }
        }
    }
}
?>
