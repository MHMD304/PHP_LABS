<?php
$l="";
$d="";
if(isset($_POST['submit']))
{
	
	$action=$_POST['submit'];
	$dollar_val=$_POST['dollar_input'];
	$lira_val=$_POST['lira_input'];
	if(!empty($dollar_val)&&$action=="to lira")
		$d=$dollar_val*90000;
	else if(!empty($lira_val)&&$action=="to dollar")
		$l=$lira_val/90000;	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        form {
            max-width: 300px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        label {
            display: inline-block;
            width: 80px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: calc(100% - 90px);
        }
    </style>
</head>
<body>
    <form action="ex3_v3.php" method="POST">
        <label for="dollar_input">DOLLAR</label>
        <input type="number" step="0.01" value = "<?php echo $l?>"  name="dollar_input" placeholder="Enter amount">
		<input type="submit" name="submit" value="to lira">
        <br>
        <label for="lira_input">LIRA</label>
        <input type="number" step="0.01" value="<?php echo $d?>"  name="lira_input" placeholder="Enter amount">
		<input type="submit" name="submit" value="to dollar">

        <br>
        
    </form>
</body>
</html>

