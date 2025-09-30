<?php
$dollar_std = 90000; 

if (isset($_GET['submit'])) {
    $dollar_val = $_GET['dollar_input'];
    $lira_val = $_GET['lira_input'];
    $action = $_GET['submit']; // Store the submit value

    if (!empty($dollar_val) && $action == "to lira") {
        echo number_format($dollar_val * $dollar_std, 2, ".", ",") . " L.L";
    } elseif (!empty($lira_val) && $action == "to dollar") {
        echo number_format($lira_val / $dollar_std, 10, ".", ",") . " $";
    } else {
        echo "Please enter a valid value.";
    }
} 
?>
