<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $productName = urldecode($_GET['product']);
    $price = urldecode($_GET['price']);
    if(isset($_GET['dir']))
        $dir = urldecode($_GET['dir']);
    $image = $dir . "/" . $productName . "%23" . $price . ".jpg";
    if(isset($_GET['add']))
    {
        session_start();
        $quntity=$_GET['quantity'];
        if(isset($_SESSION[$productName]))
        {
            $_SESSION[$productName]['quantity']+=$quntity;
        }
        else{
            $_SESSION[$productName]=array(
                "price"=>$price,
                "cat"=>$dir,
                "quantity"=>$quntity
            );
        }
        
        
        $message="product added";
    }
    
}

?>
<html>
    <head>
        <style>
            body {
                display: flex;
                justify-content: center;
                padding:10px;
                height: 100vh;
                margin: 0;
            }
            div {
                border: 1px solid black;
                height: 70vh;
                width: 40vh;
                display: flex;
                flex-direction: column; 
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 10px;
            }
            img {
                max-width: 90%; 
                max-height: 50%; 
                object-fit: contain;
            }
        </style>
    </head>
    <body>
        <div>
            <a href="list.php">List</a>
            <a href="cart.php">View cart</a>
            <h2><?php echo $productName; ?></h2>
            <h3><?php echo $price; ?></h3>
            <img src="<?php echo $image; ?>" alt="Image not found">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" action="GET">
            <input type="hidden" name="price" value="<?php echo $price; ?>"> 
            <input type="hidden" name="product" value="<?php echo $productName;?>">   
            <input type="hidden" name="dir" value="<?php echo $dir;?>">
            <input type="number" min="1" step="1" name="quantity">
            <input type="submit" name="add" value="Add To Cart">
            </form>
            <h2><?php if(isset($message))echo $message;?></h2>
        </div>
    </body>
</html>
