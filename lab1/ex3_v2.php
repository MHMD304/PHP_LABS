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
        input[type="decimal"] {
            width: calc(100% - 90px);
        }
    </style>
</head>
<body>
    <form action="ex3_v2.php" method="get">
        <label for="dollar_input">DOLLAR</label>
        <input type="decimal" id="dollar_input" name="dollar_input" placeholder="Enter amount">
		<input type="submit" name="submit" value="to lira">
        <br>
        <label for="lira_input">LIRA</label>
        <input type="decimal" id="lira_input" name="lira_input" placeholder="Enter amount">
		<input type="submit" name="submit" value="to dollar">

        <br>
        
    </form>
</body>
</html>

<?php
$dollar_std = 90000; 

if (isset($_GET['submit'])) {
    $dollar_val = $_GET['dollar_input'];
    $lira_val = $_GET['lira_input'];
    $action = $_GET['submit']; // Store the submit value

    if (!empty($dollar_val) && $action == "to lira") {
        echo number_format($dollar_val * $dollar_std, 2, ".", ",") . " L.L";
    } elseif (!empty($lira_val) && $action == "to dollar") {
        echo number_format($lira_val / $dollar_std, 2, ".", ",") . " $";
    } else {
        echo "Please enter a valid value.";
    }
} 

?>

