<?php
require "candidats.php";
require "functions.php";
if($_POST['vote'])
{
    $number=$_POST['candidates'];
    
    
    

    $winnerNumber=voter($number);
    $winnerName=$c[$winnerNumber];
   
    echo "Thank You,Today is".date("Y-m-d")."at ".date("H-i-s")." ".$winnerName." Has the most votes so Far. ";


}
?>
<html>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <select name="candidates" >
                <?php
                    foreach($c as $key=>$name)
                    {                    
                ?>
                <option value="<?php echo $key; ?>"><?php echo $name; ?></option>
                <?php 
                    }
                ?>
                <input type="submit" name="vote" value="Vote">
        </form>
    </body>
    </html>