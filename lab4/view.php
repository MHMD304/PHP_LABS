<?php

    $f=fopen("photos.txt","w");
     
    $images=scandir("flowers");
    foreach($images as $image){
        if($image!= "."&& $image!= ".."){ 
            fwrite($f,$image."\n");
        }
    }
    fclose($f);
$images=file("photos.txt");
$image_count=count($images);
if(isset($_GET["id"]))
{
    $idc=$_GET["id"];
    if($idc == 0) 
        $idp=$image_count-1;
    else
        $idp=$idc-1;
    if($idc== $image_count-1)
        $idn=0;
    else
        $idn=$idc+1;   
}
else
{   
    $idc=0;
    $idp=$image_count-1;
    $idn= 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .gallery-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid black;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        a:hover {
            background-color: black;
            color: white;
        }

        .prev {
            margin-right: 20px;
        }

        .next {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="gallery-container">
        <a class="prev" href="view.php?id=<?php echo $idp; ?>">Prev</a>
        <img src="<?php echo 'flowers/' . $images[$idc]; ?>" alt="Gallery Image">
        <a class="next" href="view.php?id=<?php echo $idn; ?>">Next</a>
        
    </div>
    <a href="upload.php">Upload an image</a>
</body>
</html>
